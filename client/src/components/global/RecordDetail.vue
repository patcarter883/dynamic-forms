<template>
  <q-page
    padding
    v-if="model"
  >
    <q-toolbar class="bg-grey-3">
      <q-toolbar-title shrink>
        {{ module.item_name }} Detail
      </q-toolbar-title>
      <q-btn
        flat
        round
        dense
        :loading="saving"
        icon="save"
        @click="saveRecord"
      />
      <q-space />
      <q-btn
        round
        dense
        color="secondary"
        icon="picture_as_pdf"
        @click="makePdf"
      />
    </q-toolbar>
    <vue-form-generator
      :schema="module.schema"
      :model.sync="model"
      :options="formOptions"
    />
  </q-page>
</template>

<script>
import VueFormGenerator from 'vue-form-generator';
import * as pdfmake from 'pdfmake/build/pdfmake';
import * as pdfFonts from 'pdfmake/build/vfs_fonts';

export default {
  name: 'RecordDetail',
  components: {},
  props: ['moduleId', 'recordId'],
  data () {
    return {
      saving: false,
      module: null,
      model: null,
      formOptions: {
        validateAfterLoad: true,
        validateAfterChanged: true,
        validateAsync: true
      }
    };
  },
  computed: {
    reportContent () {
      // return [
      //   ...this.module.schema.groups[0].fields.map(f => {
      //     return {
      //       text: [{ text: `${f.qlabel} `, bold: true }, this.model[f.model]]
      //     };
      //   })
      // ];
      return [
        ...this.module.schema.groups.map(g => {
          return pdfTable(g.fields, this.model);
        })
      ];
    }
  },
  methods: {
    async saveRecord () {
      if (this.model._id) {
        this.updateRecord();
      } else {
        this.createRecord();
      }
    },
    async updateRecord () {
      this.saving = true;
      let response = await this.$axios.put(
        'record/' + this.module.record_collection + '/' + this.model._id,
        this.model
      );
      this.model = response.data;
      this.saving = false;
    },
    async createRecord () {
      this.saving = true;
      let response = await this.$axios.post(
        'record/' + this.module.record_collection,
        this.model
      );
      this.saving = false;
      this.$router.replace(
        '/module/' + this.module._id + '/' + response.data._id
      );
    },
    makePdf () {
      pdfmake.vfs = pdfFonts.pdfMake.vfs;

      var docDefinition = {
        pageSize: 'A4',

        // by default we use portrait, you can change it to landscape if you wish
        pageOrientation: 'portrait',

        // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
        pageMargins: [15, 25],

        header: (currentPage, pageCount, pageSize) => {
          // you can apply any logic and return any valid pdfmake element

          return {
            columns: [
              {
                text: this.module.name + ' Record',
                alignment: 'left'
              },
              {
                text: 'Record Created ' + this.model.created_at,
                alignment: 'right'
              }
            ]
          };
        },
        footer: function (currentPage, pageCount) {
          return {
            columns: [
              {
                text: currentPage.toString() + ' of ' + pageCount
              }
            ]
          };
        },
        content: this.reportContent,
        styles: {
          header: {
            fontSize: 18,
            bold: true
          },
          subheader: {
            fontSize: 15,
            bold: true
          },
          quote: {
            italics: true
          },
          small: {
            fontSize: 8
          }
        }
      };

      pdfmake.createPdf(docDefinition).open();
    }
  },
  async created () {
    let response = await this.$axios.get('module/' + this.moduleId);
    this.module = response.data;
    if (this.recordId) {
      let modelResponse = await this.$axios.get(
        'record/' + this.module.record_collection + '/' + this.recordId
      );
      this.model = modelResponse.data;
    } else {
      this.model = VueFormGenerator.schema.createDefaultObject(
        this.module.schema
      );
    }
  }
};

// eslint-disable-next-line
function pdfRow(label, value) {
  return {
    table: {
      body: [[{ text: `${label}`, bold: true }, value || '']]
    },
    layout: 'noBorders'
  };
}

// eslint-disable-next-line
function pdfTable(fields, model) {
  return {
    table: {
      body: [
        ...fields.map(f => {
          return [{ text: `${f.qlabel}`, bold: true }, model[f.model] || ''];
        })
      ]
    },
    margin: [10, 20],
    layout: 'noBorders'
  };
}

// eslint-disable-next-line
function pdfParagraph(fields, model) {
  return [
    fields.map(f => {
      return {
        text: [{ text: `${f.qlabel}\t`, bold: true }, model[f.model] || '']
      };
    })
  ];
}
</script>

<template>
  <q-page v-if="module">
    <q-toolbar class="bg-grey-3">
      <q-toolbar-title shrink>{{ module.name }}</q-toolbar-title>
      <q-btn
        round
        dense
        color="secondary"
        icon="add"
        @click="$router.push('/module/' + module._id + '/new')"
      >
        <q-tooltip>Add Record</q-tooltip>
      </q-btn>
      <q-space />
      <q-btn round dense color="secondary" icon="print" @click="makePdf" />
    </q-toolbar>
    <vfg-data-table
      :models="models"
      :schema="module.schema"
      @rowClick="$router.push('/module/' + module._id + '/' + $event)"
    />
  </q-page>
</template>

<script>
import * as pdfmake from 'pdfmake/build/pdfmake';
import * as pdfFonts from 'pdfmake/build/vfs_fonts';

export default {
  name: 'RecordIndexPage',
  props: ['moduleId'],
  data () {
    return {
      module: null,
      models: []
    };
  },
  computed: {
    columns () {
      return this.module.schema.groups
        .map(g => {
          return g.fields
            .filter(f => {
              return f.tableDisplay;
            })
            .map(f => {
              return {
                name: f.model,
                label: f.qlabel,
                field: f.model
              };
            });
        })
        .flat();
    },
    tableBody () {
      return [
        this.columns.map(c => {
          return c.label;
        })
      ].concat(
        this.models.map(m => {
          return this.columns.map(c => {
            return m[c.field] || '';
          });
        })
      );
    }
  },
  methods: {
    makePdf () {
      pdfmake.vfs = pdfFonts.pdfMake.vfs;

      var docDefinition = {
        pageSize: 'A4',

        // by default we use portrait, you can change it to landscape if you wish
        pageOrientation: 'landscape',

        // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
        pageMargins: [15, 25],

        header: (currentPage, pageCount, pageSize) => {
          // you can apply any logic and return any valid pdfmake element

          return [
            {
              text: this.module.item_name + ' Register',
              alignment: currentPage % 2 ? 'left' : 'right'
            }
          ];
        },
        footer: function (currentPage, pageCount) {
          return [
            {
              text: currentPage.toString() + ' of ' + pageCount
            }
          ];
        },
        content: [
          {
            layout: 'lightHorizontalLines', // optional
            table: {
              // headers are automatically repeated if the table spans over multiple pages
              // you can declare how many rows should be treated as headers
              headerRows: 1,
              // widths: ['*', 'auto', 100, '*'],
              body: this.tableBody
            }
          }
        ]
      };

      pdfmake.createPdf(docDefinition).open();
    }
  },
  async created () {
    let response = await this.$axios.get('module/' + this.moduleId);
    this.module = response.data;
    let modelResponse = await this.$axios.get(
      'record/' + this.module.record_collection
    );
    this.models = modelResponse.data;
  }
};
</script>

<template>
  <q-page
    padding
    v-if="model"
  >
    <q-toolbar class="bg-grey-3">
      <q-toolbar-title shrink>
        Record Detail
      </q-toolbar-title>
      <q-btn
        flat
        round
        dense
        icon="save"
        @click="saveRecord"
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
import VueFormGenerator from 'vue-form-generator'

export default {
  name: 'RecordDetailPage',
  components: {
  },
  props: [
    'moduleId',
    'recordId'
  ],
  data () {
    return {
      module: null,
      model: null,
      formOptions: {
        validateAfterLoad: true,
        validateAfterChanged: true,
        validateAsync: true
      }
    }
  },
  methods: {
    async saveRecord () {
      if (this.model._id) {
        this.updateRecord()
      } else {
        this.createRecord()
      }
    },
    async updateRecord () {
      let response = await this.$axios.put('record/' + this.module.record_collection + '/' + this.model._id, this.model)
      this.module = response.data
    },
    async createRecord () {
      let response = await this.$axios.post('record/' + this.module.record_collection, this.model)
      this.$router.replace('/module/' + this.module._id + '/' + response.data._id)
    }
  },
  async created () {
    let response = await this.$axios.get('module/' + this.moduleId)
    this.module = response.data
    if (this.recordId) {
      let modelResponse = await this.$axios.get('record/' + this.module.record_collection + '/' + this.recordId)
      this.model = modelResponse.data
    } else {
      this.model = VueFormGenerator.schema.createDefaultObject(this.module.schema)
    }
  }
}
</script>

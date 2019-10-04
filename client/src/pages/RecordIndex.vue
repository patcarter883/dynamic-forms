<template>
  <q-page v-if="module">
    <q-toolbar class="bg-grey-3">
      <q-toolbar-title shrink>
        {{ module.name }}
      </q-toolbar-title>
      <q-btn
        flat
        round
        dense
        icon="add"
        @click="$router.push('/module/' + module._id + '/new')"
      />
    </q-toolbar>
    <vfg-data-table
      :models="models"
      :schema="module.schema"
    />
  </q-page>
</template>

<script>
export default {
  name: 'RecordIndexPage',
  props: [
    'moduleId'
  ],
  data () {
    return {
      module: null,
      models: []
    }
  },
  async created () {
    let response = await this.$axios.get('module/' + this.moduleId)
    this.module = response.data
    let modelResponse = await this.$axios.get('record/' + this.module.record_collection)
    this.models = modelResponse.data
  }
}
</script>

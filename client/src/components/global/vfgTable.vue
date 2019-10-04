<template>
  <div>
    <q-table
      :data="data"
      :columns="columns"
      row-key="id"
    />
  </div>
</template>

<script>
export default {
  name: 'VfgDataTable',
  props: [
    'schema',
    'models'
  ],
  data () {
    return {}
  },
  computed: {
    columns () {
      return this.schema.groups.map(g => {
        return g.fields
          .filter(f => {
            return f.tableDisplay
          })
          .map(f => {
            return {
              name: f.model,
              label: f.qlabel,
              field: f.model
            }
          })
      }).flat()
    },
    data () {
      return this.models
    }
  }
}
</script>

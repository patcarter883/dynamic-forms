<template>
  <div>
    <q-table
      :data="data"
      :columns="columns"
      row-key="id"
      :class="'q-ma-sm'"
    >
      <template
        class="row"
        #body="props"
      >
        <q-tr
          :props="props"
          @click.native="rowClick(props.row)"
          class="cursor-pointer"
        >
          <q-td
            v-for="col
            in
            props.cols"
            :key="col.name"
            :props="props"
          >
            {{ col.value }}
          </q-td>
        </q-tr>
      </template>
    </q-table>
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
  },
  methods: {
    rowClick (row) {
      console.log(row)
      this.$emit('rowClick', row._id)
    }
  }
}
</script>

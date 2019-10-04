<template>
  <div class="row cursor-pointer bg-grey-3 q-mb-md q-pa-sm">
    <div class="col-4 column">
      <my-input
        label="Group Label"
        v-model="group.legend"
        dense
        :class="'q-pb-sm'"
      />
      <q-btn
        label="Add Field"
        dense
        icon="add"
        @click="addField"
        color="positive"
      />
    </div>
    <div class="offset-md-1 col">
      <draggable
        v-model="group.fields"
        group="fields"
      >
        <schema-field
          v-for="(field, i) in group.fields"
          :key="i"
          :field.sync="group.fields[i]"
        />
      </draggable>
    </div>
  </div>
</template>

<script>
import draggable from 'vuedraggable'
import SchemaField from './schemaField'

export default {
  name: 'SchemaGroup',
  components: {
    draggable,
    SchemaField
  },
  props: [
    'group'
  ],
  computed: {

  },
  data () {
    return {}
  },
  methods: {
    addField () {
      let newField = {
        type: '',
        qlabel: '',
        model: '',
        tableDisplay: false
      }
      this.group.fields.push(newField)
    }
  }
}
</script>

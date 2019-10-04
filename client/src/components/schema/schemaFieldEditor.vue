<template>
  <q-dialog v-model="show">
    <q-card>
      <q-toolbar>
        <q-avatar>
          <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg">
        </q-avatar>

        <q-toolbar-title>Edit Field</q-toolbar-title>

        <q-btn
          flat
          round
          dense
          icon="close"
          @click="close"
        />
      </q-toolbar>

      <q-card-section>
        <my-select
          label="Field Type"
          :options="fieldTypeOptions"
          v-model="field.type"
        />
        <my-input
          label="Field Label"
          :value="field.qlabel"
          @input="labelInput"
        />
        <q-checkbox
          v-model="field.tableDisplay"
          label="Display in Index Table"
        />
        <schema-field-values-editor
          v-if="field.type == 'qSelect'"
          :options.sync="field.values"
        />
      </q-card-section>
    </q-card>
  </q-dialog>
</template>

<script>
import SchemaFieldValuesEditor from './schemaFieldValuesEditor'

export default {
  name: 'SchemaFieldEditor',
  components: {
    SchemaFieldValuesEditor
  },
  props: [
    'field',
    'show'
  ],
  computed: {

  },
  data () {
    return {
      fieldTypeOptions: [
        'qInput',
        'qSelect',
        'qDate',
        'qDateTime',
        'qCheckBox'
      ]
    }
  },
  methods: {
    close () {
      this.$emit('update:show', false)
    },
    labelInput (value) {
      console.log(value)
      this.field.qlabel = value
      this.field.model = value.replace(/\s+/g, '_').toLowerCase()
    }
  }
}
</script>

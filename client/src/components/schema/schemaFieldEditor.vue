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
          @click="$emit('update:show', false)"
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
          v-model="field.qlabel"
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
    'value',
    'show'
  ],
  computed: {
    field: {
      get () {
        return this.value
      },
      set (value) {
        this.$emit('input', value)
      }
    }
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
  }
}
</script>

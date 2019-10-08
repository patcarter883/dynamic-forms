<template>
  <q-dialog v-model="show">
    <q-card v-if="field">
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
          v-if="['qSelect', 'qTogglebutton'].includes(field.type)"
          :options.sync="field.values"
        />
      </q-card-section>
    </q-card>
  </q-dialog>
</template>

<script>
import SchemaFieldValuesEditor from './schemaFieldValuesEditor';

export default {
  name: 'SchemaFieldEditor',
  components: {
    SchemaFieldValuesEditor
  },
  props: ['field', 'show'],
  computed: {},
  data () {
    return {
      fieldTypeOptions: [
        'qInput',
        'qTextarea',
        'qSelect',
        'qDate',
        'qDateTime',
        'qCheckbox',
        'qTogglebutton',
        'qYesno'
      ]
    };
  },
  methods: {
    close () {
      this.$emit('update:show', false);
    },
    labelInput (value) {
      this.field.qlabel = value;
      this.field.model = value
        .replace(/[^\w\s]|_/g, '')
        .replace(/\s+/g, '_')
        .toLowerCase();
    }
  }
};
</script>

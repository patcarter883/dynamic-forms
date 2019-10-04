<template>
  <div class="row cursor-pointer bg-grey-4 q-mb-sm q-pa-sm">
    {{ field.qlabel }}
    <schema-field-editor
      :field.sync="field"
      :show.sync="showEditor"
    />
    <q-space />
    <q-btn
      icon="edit"
      round
      color="accent"
      size="sm"
      @click="showEditor=true"
    />
  </div>
</template>

<script>
import schemaFieldEditor from './schemaFieldEditor'

export default {
  name: 'SchemaField',
  components: {
    schemaFieldEditor
  },
  props: [
    'field'
  ],
  computed: {

  },
  data () {
    return {
      showEditor: false
    }
  }
}
</script>

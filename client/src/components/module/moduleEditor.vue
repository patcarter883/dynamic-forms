<template>
  <div class="q-ma-sm">
    <div class="row">
      <my-input
        label="Module Name"
        v-model="module.name"
      />
    </div>
    <div class="row">
      <div class="col-6">
        <schema-editor :schema.sync="module.schema" />
      </div>
    </div>
  </div>
</template>

<script>
import SchemaEditor from 'components/schema/schemaEditor'

export default {
  name: 'ModuleEditor',
  components: {
    SchemaEditor
  },
  props: [
    'module'
  ],
  data () {
    return {}
  }
}
</script>

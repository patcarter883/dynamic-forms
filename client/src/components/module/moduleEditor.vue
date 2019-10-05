<template>
  <div class="q-ma-sm">
    <div class="row">
      <my-input
        label="Module Name"
        v-model="module.name"
      />
      <my-input
        label="Item Name"
        v-model="module.item_name"
      />
    </div>
    <div class="row">
      <div class="col-4">
        <notification-list-editor :list.sync="module.notification_list" />
      </div>
      <div class="col-8">
        <schema-editor :schema.sync="module.schema" />
      </div>
    </div>
  </div>
</template>

<script>
import SchemaEditor from 'components/schema/schemaEditor'
import NotificationListEditor from './notificationListEditor'

export default {
  name: 'ModuleEditor',
  components: {
    SchemaEditor,
    NotificationListEditor
  },
  props: [
    'module'
  ],
  data () {
    return {}
  }
}
</script>

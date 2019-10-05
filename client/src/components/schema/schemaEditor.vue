<template>
  <div class="q-ma-sm">
    <div class="row items-center q-pb-md">
      <div class="text-h6">
        Form Editor
      </div>
      <q-space />
      <q-btn
        label="Add Group"
        dense
        icon="add"
        @click="addGroup"
        color="positive"
      />
    </div>

    <draggable
      v-model="schema.groups"
      group="groups"
    >
      <schema-group
        v-for="(group, i) in schema.groups"
        :key="i"
        :group.sync="schema.groups[i]"
      />
    </draggable>
  </div>
</template>

<script>
import SchemaGroup from './schemaGroup'
import draggable from 'vuedraggable'

export default {
  name: 'SchemaEditor',
  components: {
    SchemaGroup,
    draggable
  },
  props: [
    'schema'
  ],
  data () {
    return {}
  },
  methods: {
    addGroup () {
      let newGroup = {
        legend: '',
        fields: []
      }
      this.schema.groups.push(newGroup)
    }
  }
}
</script>

<template>
  <q-page padding>
    <q-toolbar class="bg-grey-3">
      <q-toolbar-title shrink>
        Module Detail
      </q-toolbar-title>
      <q-btn
        flat
        round
        dense
        icon="save"
        @click="saveModule"
      />
    </q-toolbar>
    <module-editor
      v-if="module"
      :module="module"
    />
  </q-page>
</template>

<script>
import ModuleEditor from 'components/module/moduleEditor'

export default {
  name: 'ModuleDetailPage',
  components: {
    ModuleEditor
  },
  props: [
    'moduleId'
  ],
  data () {
    return {
      module: null
    }
  },
  methods: {
    async saveModule () {
      if (this.module._id) {
        this.updateModule()
      } else {
        this.createModule()
      }
    },
    async updateModule () {
      let response = await this.$axios.put('module/' + this.module._id, this.module)
      this.module = response.data
    },
    async createModule () {
      let response = await this.$axios.post('module', this.module)
      this.$router.replace('/admin/module/' + response.data._id)
    }
  },
  async created () {
    if (this.moduleId) {
      let response = await this.$axios.get('module/' + this.moduleId)
      this.module = response.data
    } else {
      this.module = {
        name: '',
        notification_list: [],
        schema: {
          groups: []
        }
      }
    }
  }
}
</script>

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
        :loading="saving"
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
import ModuleEditor from 'components/module/moduleEditor';

export default {
  name: 'ModuleDetailPage',
  components: {
    ModuleEditor
  },
  props: ['moduleId'],
  data () {
    return {
      module: null,
      saving: false
    };
  },
  methods: {
    async saveModule () {
      if (this.module._id) {
        this.updateModule();
      } else {
        this.createModule();
      }
    },
    async updateModule () {
      this.saving = true;
      let response = await this.$axios.put(
        'module/' + this.module._id,
        this.module
      );
      this.module = response.data;
      this.saving = false;
    },
    async createModule () {
      this.saving = true;
      let response = await this.$axios.post('module', this.module);
      this.saving = false;
      this.$router.replace('/admin/module/' + response.data._id);
    }
  },
  async created () {
    if (this.moduleId) {
      let response = await this.$axios.get('module/' + this.moduleId);
      this.module = response.data;
    } else {
      this.module = {
        name: '',
        notification_list: [],
        schema: {
          groups: []
        }
      };
    }
  }
};
</script>

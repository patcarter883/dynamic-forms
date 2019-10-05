<template>
  <q-page>
    <q-toolbar class="bg-grey-3">
      <q-toolbar-title shrink>
        Module Admin
      </q-toolbar-title>
      <q-btn
        round
        dense
        icon="add"
        @click="$router.push('/admin/module/new')"
        color="secondary"
      />
    </q-toolbar>
    <div class="q-ma-sm">
      <q-list
        bordered
        separator
      >
        <nav-menu-item
          v-for="(module, index) in modules"
          :key="index"
          :to="'/admin/module/' + module._id"
        >
          {{ module.name }}
        </nav-menu-item>
      </q-list>
    </div>
  </q-page>
</template>

<script>
export default {
  name: 'ModuleIndexPage',
  data () {
    return {
      modules: []
    }
  },
  async created () {
    let response = await this.$axios.get('module')
    this.modules = response.data
  }
}
</script>

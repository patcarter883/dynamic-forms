<template>
  <q-list>
    <nav-menu-item
      v-for="(module, index) in modules"
      :key="index"
      :to="'/module/' + module._id"
    >
      {{ module.name }}
    </nav-menu-item>
    <nav-menu-item :to="'/admin/module'">
      Module Admin
    </nav-menu-item>
  </q-list>
</template>

<script>
export default {
  name: 'ModuleMenu',
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

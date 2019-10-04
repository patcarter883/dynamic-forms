<template>
  <q-page padding>
    <q-btn
      label="New Module"
      dense
      icon="add"
      @click="$router.push('/admin/module/new')"
      color="positive"
    />
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

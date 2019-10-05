<template>
  <div class="q-ma-sm">
    <div class="row items-center q-pb-md">
      <div class="text-h6">
        Notification List
      </div>
      <q-space />
      <q-btn
        round
        dense
        icon="add"
        @click="addItem"
        color="positive"
      />
    </div>
    <div
      :class="'row items-center'"
      v-for="(item, index) in list"
      :key="index"
    >
      <my-input
        dense
        label="Name"
        v-model="item.name"
      />
      <my-input
        dense
        label="Email"
        v-model="item.email"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: 'NotificationListEditor',
  props: [
    'list'
  ],
  data () {
    return {}
  },
  methods: {
    addItem () {
      let newItem = {
        name: '',
        email: ''
      }
      this.list.push(newItem)
    }
  }
}
</script>

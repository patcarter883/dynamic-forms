<template>
  <q-item
    clickable
    tag="a"
    :to="to"
  >
    <q-item-section
      avatar
      v-if="$attrs.icon"
    >
      <q-icon :name="$attrs.icon" />
    </q-item-section>
    <q-item-section>
      <q-item-label>
        <slot></slot>
      </q-item-label>
    </q-item-section>
  </q-item>
</template>

<script>
export default {
  name: 'NavMenuItem',
  props: [
    'to'
  ]
}
</script>

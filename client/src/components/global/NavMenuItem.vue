<template>
  <q-item
    clickable
    tag="a"
    :to="to"
    dark
  >
    <q-item-section avatar>
      <q-icon :name="icon" />
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
    'to',
    'icon'
  ]
}
</script>

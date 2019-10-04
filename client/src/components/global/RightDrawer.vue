<template>
  <q-drawer
    side="right"
    :value="value"
    @input="$emit('input', $event)"
    overlay
    :width="$attrs.width || $q.screen.width * 0.65"
    content-class="bg-grey-8"
    v-bind="$attrs"
  >
    <slot name="toolbar">

    </slot>
    <q-scroll-area class="fit">
      <div class="q-pa-sm">
        <slot></slot>
      </div>
    </q-scroll-area>
  </q-drawer>
</template>

<script>
export default {
  name: 'RightDrawer',
  props: ['value']
}
</script>

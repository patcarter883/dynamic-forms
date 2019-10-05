<template>
  <q-input
    filled
    :value="value"
    @input="$emit('input', $event)"
    v-bind="$attrs"
    :class="'q-my-xs q-mr-auto'"
  />
</template>

<script>
export default {
  name: 'MyInput',
  props: [
    'value'
  ]
}
</script>

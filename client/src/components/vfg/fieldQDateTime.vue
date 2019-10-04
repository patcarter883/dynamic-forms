<template>
  <my-date-time
    standout
    v-model="value"
    :label="schema.qlabel"
    :disabled="disabled"
    :maxlength="schema.max"
    :placeholder="schema.placeholder"
    :readonly="schema.readonly"
  />
</template>

<script>
import { abstractField } from 'vue-form-generator'

export default {
  name: 'fieldQDateTime',
  mixins: [abstractField]
}
</script>

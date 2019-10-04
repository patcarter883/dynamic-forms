<template>
  <my-date
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
  name: 'fieldQDate',
  mixins: [abstractField]
}
</script>

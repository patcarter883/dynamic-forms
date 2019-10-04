<template>
  <q-checkbox
    filled
    v-model="value"
    :disabled="disabled"
    :maxlength="schema.max"
    :placeholder="schema.placeholder"
    :readonly="schema.readonly"
    :label="schema.qlabel"
  />

</template>

<script>
import { abstractField } from 'vue-form-generator'

export default {
  name: 'fieldQCheckbox',
  mixins: [abstractField]
}
</script>

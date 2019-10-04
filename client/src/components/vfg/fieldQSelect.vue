<template>
  <q-select
    filled
    v-model="value"
    :options="schema.values"
    :disabled="disabled"
    :readonly="schema.readonly"
    :label="schema.qlabel"
  />
</template>

<script>
import { abstractField } from 'vue-form-generator'

export default {
  name: 'fieldQSelect',
  mixins: [abstractField]
}
</script>

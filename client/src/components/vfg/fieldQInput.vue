<template>
  <q-input
    filled
    v-model="value"
    :disabled="disabled"
    :maxlength="schema.max"
    :placeholder="schema.placeholder"
    :readonly="schema.readonly"
    :label="schema.qlabel"
    class="q-my-sm"
  />
</template>

<script>
import { abstractField } from 'vue-form-generator';

export default {
  name: 'fieldQInput',
  mixins: [abstractField]
};
</script>

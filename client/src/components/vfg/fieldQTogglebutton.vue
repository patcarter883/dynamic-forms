<template>
  <q-btn-toggle
    filled
    v-model="value"
    toggle-color="primary"
    :options="schema.values"
    :disabled="disabled"
    :placeholder="schema.placeholder"
    :readonly="schema.readonly"
    :label="schema.qlabel"
    class="q-my-sm"
  />

</template>

<script>
import { abstractField } from 'vue-form-generator';

export default {
  name: 'fieldQTogglebutton',
  mixins: [abstractField]
};
</script>

<template>
  <vue-form-generator
    :schema="schema.schema"
    :model.sync="schema.value"
    :options="formOptions"
  />
</template>

<script>
import { abstractField } from 'vue-form-generator';

export default {
  name: 'fieldQInput',
  mixins: [abstractField]
};
</script>

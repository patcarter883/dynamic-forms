<template>
  <div class="row q-my-sm bg-grey-4 q-pa-sm items-center">
    <div class="col q-pr-sm">
      {{ schema.qlabel }}
    </div>
    <div class="col-auto">
      <q-btn-toggle
        filled
        v-model="value"
        toggle-color="primary"
        :options="[
          { label: 'Yes', value: 'Yes' },
          { label: 'No', value: 'No' }
        ]"
        :disabled="disabled"
        :placeholder="schema.placeholder"
        :readonly="schema.readonly"
      />
    </div>
  </div>

</template>

<script>
import { abstractField } from 'vue-form-generator';

export default {
  name: 'fieldQYesno',
  mixins: [abstractField]
};
</script>

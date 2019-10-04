<template>
  <q-input
    :class="'q-my-xs'"
    filled
    v-bind:value="value"
    :label="label"
    @input="input"
    mask="##-##-####"
    :rules="[v => /^(((0[1-9]|[12]\d|3[01])-(0[13578]|1[02])-((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)-(0[13456789]|1[012])-((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])-02-((1[6-9]|[2-9]\d)\d{2}))|(29-02-((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/.test(v)]"
  >
    <template v-slot:append>
      <q-icon
        name="event"
        class="cursor-pointer"
      >
        <q-popup-proxy
          ref="qDateProxy"
          transition-show="scale"
          transition-hide="scale"
        >
          <q-date
            v-bind:value="value"
            @input="input"
            mask="DD-MM-YYYY"
          />
        </q-popup-proxy>
      </q-icon>
    </template>
  </q-input>
</template>

<script>
import { date } from 'quasar'
export default {
  name: 'MyDate',
  props: {
    'value': {
      type: String,
      default: () => date.formatDate(new Date(), 'DD-MM-YYYY')
    },
    'label': {
      type: String,
      default: 'Date'
    }
  },
  methods: {
    input (e) {
      this.$refs.qDateProxy.hide()
      this.$emit('input', e)
    }
  }
}
</script>

<style>
</style>

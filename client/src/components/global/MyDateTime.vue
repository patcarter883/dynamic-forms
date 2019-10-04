<template>
  <q-input
    :class="'q-my-xs'"
    filled
    value="value"
    :label="label"
    @input="input"
    mask="##-##-#### ##:##"
  >
    <template v-slot:prepend>
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
            mask="DD-MM-YYYY HH:mm"
            today-btn
          />
        </q-popup-proxy>
      </q-icon>
    </template>

    <template v-slot:append>
      <q-icon
        name="access_time"
        class="cursor-pointer"
      >
        <q-popup-proxy
          ref="qTimeProxy"
          transition-show="scale"
          transition-hide="scale"
        >
          <q-time
            v-bind:value="value"
            @input="input"
            mask="DD-MM-YYYY HH:mm"
            format24h
          />
        </q-popup-proxy>
      </q-icon>
    </template>
  </q-input>
</template>

<script>
import { date } from 'quasar'

export default {
  name: 'MyDateTime',
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
      this.$refs.qTimeProxy.hide()
      this.$emit('input', e)
    }
  }
}
</script>

<style>
</style>

<template>
  <q-select
    :value="value"
    @input="$emit('input', $event)"
    @filter="filterFn"
    :options="options"
    v-bind="$attrs"
    filled
    use-input
    hide-selected
    fill-input
    input-debounce="0"
    :class="'q-my-xs'"
  >
    <template v-slot:no-option>
      <q-item>
        <q-item-section class="text-grey">
          No results
        </q-item-section>
      </q-item>
    </template></q-select>
</template>

<script>
export default {
  name: 'MySelect',
  props: {
    'value': String,
    options: {
      type: Array,
      default: () => []
    }
  },
  data () {
    return {
      selectOptions: this.options
    }
  },
  methods: {
    filterFn (val, update, abort) {
      update(() => {
        const needle = val.toLowerCase()
        this.selectOptions = this.options.filter(v => v.toLowerCase().indexOf(needle) > -1)
      })
    }
  }
}
</script>

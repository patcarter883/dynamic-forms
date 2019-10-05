<template>
  <div>
    <div class="row items-center">
      <div class="text-subtitle">
        Option Values
      </div>
      <q-space />
      <q-btn
        round
        dense
        icon="add"
        @click="addOption"
        color="positive"
      />
    </div>
    <div
      v-for="(option, index) in options"
      class="row items-center"
      :key="index"
    >
      <my-input
        v-model="options[index]"
        dense
      />
      <q-space />
      <q-btn
        round
        dense
        icon="delete"
        @click="deleteOption(index)"
        color="negative"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: 'SchemaFieldValuesEditor',
  props: [
    'options'
  ],
  computed: {

  },
  data () {
    return {}
  },
  methods: {
    deleteOption (index) {
      this.options.splice(index, 1)
    },
    addOption () {
      if (this.options === undefined) {
        this.$emit('update:options', [])
        this.$nextTick(() => {
          let newOption = ''
          this.options.push(newOption)
        })
      } else {
        let newOption = ''
        this.options.push(newOption)
      }
    }
  }
}
</script>

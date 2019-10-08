<template>
  <record-index
    :key="moduleId"
    :moduleId="moduleId"
  />
</template>

<script>
export default {
  name: 'RecordIndexPage',
  props: ['moduleId']
};
</script>

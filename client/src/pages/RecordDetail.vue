<template>
  <record-detail
    :key="recordId"
    :moduleId="moduleId"
    :recordId="recordId"
  />
</template>

<script>
export default {
  name: 'RecordDetailPage',
  props: ['moduleId', 'recordId']
};
</script>

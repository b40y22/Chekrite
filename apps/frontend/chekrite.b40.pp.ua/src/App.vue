<template>
  <task-manager></task-manager>
</template>

<script>
import TaskManager from "@/views/TaskManager.vue";

export default {
  name: "App",
  components: { TaskManager },
};
</script>

<style lang="scss">
@import "@/assets/styles";
</style>

<template>
  <Header />
  <router-view></router-view>
</template>

<script>
import { mapActions } from "vuex";
import Header from "@/components/layouts/Header.vue";

export default {
  name: "TaskManager",
  components: { Header },
  methods: {
    ...mapActions(["setTasks", "setTasksArchive"]),
  },
  created() {
    this.setTasks();
    this.setTasksArchive();
  },
};
</script>

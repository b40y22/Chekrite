<template>
  <td>
    <router-link
      :to="{ name: 'TaskEdit', params: { id: task.id } }"
      class="fa fa-pencil action"
      title="Редагувати"
    ></router-link>
    <i
      class="fa fa-check-square-o action"
      aria-hidden="true"
      title="Зроблена"
      @click="closeTask(task)"
    ></i>
  </td>
</template>

<script>
import api from "@/api";
import { mapActions } from "vuex";

export default {
  name: "TaskTableActiveActions",
  props: {
    task: {
      type: Object,
      required: true,
    },
  },
  methods: {
    ...mapActions(["setTasks", "closeTask", "setTasksArchive"]),
    closeTask(task) {
      api.closeTask(task.id).then((response) => {
        if (response.status === 200) {
          this.closeTask(task);
          this.setTasks();
          this.setTasksArchive();
        }
      });
    },
  },
};
</script>

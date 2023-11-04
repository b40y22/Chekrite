<template>
  <td>
    <i
      class="fa fa-times action"
      title="Видалити"
      @click="deleteTask(task)"
    ></i>
    <i
      class="fa fa-arrow-circle-o-left action"
      aria-hidden="true"
      title="Повернути"
      @click="activateTask(task)"
    ></i>
  </td>
</template>

<script>
import api from "@/api";
import { mapActions } from "vuex";

export default {
  name: "TaskTableArchiveActions",
  props: {
    task: {
      type: Object,
      required: true,
    },
  },
  methods: {
    ...mapActions(["setTasks", "setTasksArchive"]),
    deleteTask(task) {
      api.deleteTask(task.id).then((response) => {
        if (response.status === 200) {
          this.setTasksArchive();
        }
      });
    },
    activateTask(task) {
      api.activateTask(task.id).then((response) => {
        if (response.status === 200) {
          this.setTasks();
          this.setTasksArchive();
        }
      });
    },
  },
};
</script>

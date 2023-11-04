<template>
  <div class="container mt-50">
    <div class="row">
      <p>Головна > Список задач</p>
    </div>
    <div class="col-6 offset-3 mt-50">
      <div class="form-group">
        <label for="title">Title</label>
        <input
          type="text"
          class="form-control"
          id="title"
          placeholder="Назва задачи"
          v-model="getTask.title"
        />
      </div>

      <div class="form-group mt-3">
        <label for="description">Description</label>
        <textarea
          class="form-control"
          id="description"
          rows="3"
          placeholder="Опис задачи"
          v-model="getTask.description"
        ></textarea>
      </div>

      <div class="form-group mt-3">
        <label for="importance">Importance</label>
        <select
          class="form-control"
          id="importance"
          v-model="getTask.importance"
        >
          <option value="high">High</option>
          <option value="middle">Middle</option>
          <option value="low">Low</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary mt-3" @click="taskUpdate">
        Update task
      </button>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import store from "@/store";
import api from "@/api";

export default {
  name: "TaskEdit",
  computed: {
    ...mapGetters(["getTask"]),
  },
  created() {
    store.dispatch("setTask", this.$route.params.id);
  },
  methods: {
    ...mapActions(["setTasks"]),
    taskUpdate() {
      api.updateTask(this.getTask).then((response) => {
        if (response.status === 200) {
          this.setTasks();
        }
      });
    },
  },
};
</script>

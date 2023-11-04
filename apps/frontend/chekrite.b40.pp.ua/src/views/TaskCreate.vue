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
          v-model="newTask.title"
        />
      </div>

      <div class="form-group mt-3">
        <label for="description">Description</label>
        <textarea
          class="form-control"
          id="description"
          rows="3"
          placeholder="Опис задачи"
          v-model="newTask.description"
        ></textarea>
      </div>

      <div class="form-group mt-3">
        <label for="importance">Importance</label>
        <select
          class="form-control"
          id="importance"
          v-model="newTask.importance"
        >
          <option value="low">Low</option>
          <option value="middle">Middle</option>
          <option value="high">High</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success mt-3" @click="createTask">
        Create task
      </button>
    </div>
  </div>
</template>

<script>
import api from "@/api";
import { mapActions } from "vuex";

export default {
  name: "TaskCreate",
  data() {
    return {
      newTask: {
        title: null,
        description: null,
        importance: null,
      },
    };
  },
  methods: {
    ...mapActions(["setTasks"]),
    createTask() {
      api.createTask(this.newTask).then((response) => {
        if (response.status === 200) {
          this.setTasks();
        }
      });
    },
  },
};
</script>

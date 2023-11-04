import { createStore } from "vuex";
import api from "@/api/index.js";

export default createStore({
  state: {
    task: [],
    tasks: [],
    tasksArchive: [],
  },
  getters: {
    getTask: ({ task }) => task,
    getTasks: ({ tasks }) => tasks,
    getTasksArchive: ({ tasksArchive }) => tasksArchive,
  },
  mutations: {
    setTask(state, task) {
      state.task = task;
    },
    setTasks(state, tasks) {
      state.tasks = tasks;
    },
    setTasksArchive(state, tasksArchive) {
      state.tasksArchive = tasksArchive;
    },
    closeTask(state, task) {
      state.tasks = state.tasks.filter((taskItem) => task.id !== taskItem.id);
    },
  },
  actions: {
    async setTask({ commit }, id) {
      const task = await api.getTaskById(id);
      commit("setTask", task.data.data);
    },
    async setTasks({ commit }) {
      const tasks = await api.getTaskList();
      commit("setTasks", tasks.data.data);
    },
    async setTasksArchive({ commit }) {
      const tasks = await api.getTaskArchiveList();
      commit("setTasksArchive", tasks.data.data);
    },
    closeTask({ commit }, task) {
      commit("closeTask", task);
    },
  },
  modules: {},
});

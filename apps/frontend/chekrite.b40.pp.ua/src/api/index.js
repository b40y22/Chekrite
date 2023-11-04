import axios from "axios";
axios.defaults.baseURL = "http://api.chekrite.b40.pp.ua/api";
axios.defaults.headers.common["Accept-Language"] =
  process.env.VUE_APP_LANGUAGE === "ua" ?? "en";

export default {
  // Tasks
  getTaskList() {
    return axios.get("/tasks");
  },
  closeTask(id) {
    return axios.get("/task/close/" + id);
  },
  getTaskById(id) {
    return axios.get("/task/" + id);
  },
  updateTask(task) {
    return axios.put("/task/", task);
  },
  createTask(task) {
    return axios.post("/task/", task);
  },
  getTaskArchiveList() {
    return axios.get("/tasks/archive");
  },
  deleteTask(id) {
    return axios.delete("/task/" + id);
  },
  activateTask(id) {
    return axios.get("/task/activate/" + id);
  },
};

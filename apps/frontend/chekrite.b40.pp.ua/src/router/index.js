import { createRouter, createWebHistory } from "vue-router";
import TaskCreate from "@/views/TaskCreate.vue";
import TaskList from "@/views/TaskList.vue";
import TaskEdit from "@/views/TaskEdit.vue";

const routes = [
  {
    path: "/",
    name: "TaskList",
    component: TaskList,
    beforeEnter(to, from, next) {
      to.params.timestamp = Date.now();
      next();
    },
  },
  {
    path: "/task/create",
    name: "TaskCreate",
    component: TaskCreate,
  },
  {
    path: "/task/edit/:id",
    name: "TaskEdit",
    component: TaskEdit,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

<template>
  <div class="row mt-50">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">№</th>
          <th scope="col">Назва</th>
          <th scope="col">Опис</th>
          <th scope="col">Автор</th>
          <th scope="col">Дата створення</th>
          <th scope="col">Важливість</th>
          <th scope="col">Дії</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(task, index) in tasks" :key="task.id">
          <th>{{ index + 1 }}</th>
          <td class="col-lg-1">{{ task.title }}</td>
          <td class="col-lg-6">{{ task.description }}</td>
          <td class="col-lg-1">{{ task.user.name }}</td>
          <td class="col-lg-1">{{ formatCreatedDate(task.created_at) }}</td>
          <td class="col-lg-1">
            <div
              class="mark-importance"
              :class="task.importance"
              :title="task.importance"
            ></div>
          </td>
          <task-table-active-actions v-if="tabType === 'active'" :task="task" />
          <task-table-archive-actions
            v-if="tabType === 'archive'"
            :task="task"
          />
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import helpers from "@/helpers";
import TaskTableActiveActions from "@/components/TaskTableActiveActions.vue";
import TaskTableArchiveActions from "@/components/TaskTableArchiveActions.vue";

export default {
  name: "TasksTable",
  components: { TaskTableArchiveActions, TaskTableActiveActions },
  props: {
    tasks: {
      type: Array,
      required: true,
    },
    tabType: {
      type: String,
      required: true,
    },
  },
  methods: {
    formatCreatedDate(date) {
      return helpers.dateFormat(date);
    },
  },
};
</script>

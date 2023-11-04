<template>
  <div class="container mt-50">
    <div class="row">
      <p>Головна > Список задач</p>
    </div>

    <ul class="nav nav-tabs mt-50">
      <li class="nav-item">
        <a
          class="nav-link"
          :class="{ active: getActiveTab('active') }"
          href="#"
          @click="setActiveTab('active')"
          >Активні</a
        >
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          :class="{ active: getActiveTab('archive') }"
          href="#"
          @click="setActiveTab('archive')"
          >Архив</a
        >
      </li>
    </ul>

    <tasks-table
      v-if="getActiveTab('active')"
      :tasks="getTasks"
      :tab-type="activeTab"
    />
    <tasks-table v-else :tasks="getTasksArchive" :tab-type="activeTab" />
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import TasksTable from "@/components/TasksTable.vue";

export default {
  name: "TaskList",
  components: { TasksTable },
  data() {
    return {
      activeTab: "active",
    };
  },
  computed: {
    ...mapGetters(["getTasks", "getTasksArchive"]),
  },
  methods: {
    setActiveTab(tab) {
      this.activeTab = tab;
    },
    getActiveTab(tab) {
      return this.activeTab === tab;
    },
  },
};
</script>

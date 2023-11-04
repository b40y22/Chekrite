<template>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <div
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
      >
        <ul
          class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
        >
          <li>
            <router-link
              :to="{ name: 'TaskList' }"
              class="nav-link px-2 text-white"
              >Головна</router-link
            >
          </li>
          <li>
            <router-link
              :to="{ name: 'TaskCreate' }"
              class="nav-link px-2 text-white"
              >Додати задачу</router-link
            >
          </li>
        </ul>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  /* eslint-disable vue/multi-word-component-names */
  name: "Header",
};
</script>

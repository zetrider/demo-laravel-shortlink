<template>
  <main>
    <div class="container">
      <header class="d-flex justify-content-center py-3 mb-4 border-bottom">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <Link
              :href="route('links.create')"
              class="nav-link"
              :class="{ active: route().current('links.create') }"
              >Создать</Link
            >
          </li>
          <li class="nav-item">
            <Link
              :href="route('stat.index')"
              class="nav-link"
              :class="{ active: route().current('stat.index') }"
              >Статистика</Link
            >
          </li>
        </ul>
      </header>
      <slot />
    </div>
  </main>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
};
</script>

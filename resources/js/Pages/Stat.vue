<template>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div>
        <h5>Статистика</h5>

        <p>
          Общее количество уникальных посетителей для каждой ссылки в базе
          данных за последние 14 дней:
        </p>

        <h1>{{ count }}</h1>
      </div>
    </div>
  </div>
</template>

<script>
import BaseLayout from "@/Layouts/BaseLayout.vue";

export default {
  layout: BaseLayout,

  props: {
    count: Number,
  },
};
</script>

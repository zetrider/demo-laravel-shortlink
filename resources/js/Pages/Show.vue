<template>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div>
        <div class="small text-muted">{{ link.url }}</div>
        <h5>
          <a :href="link.short" target="_blank">{{ link.short }}</a>
        </h5>
        <div class="d-flex justify-content-between">
          <span class="badge bg-light text-dark" v-if="link.commercial">
            Коммерческая
          </span>
          <span class="badge bg-info text-dark">
            Добавлена: {{ link.created_at }}
          </span>
          <span class="badge bg-warning text-dark">
            Активна до: {{ link.expired_at }}
          </span>
        </div>
      </div>

      <hr />

      <h4>Статистика</h4>
      <div v-if="stats.data.length">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Дата перехода</th>
              <th v-if="link.commercial">Изображение</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(stat, index) in stats.data" :key="index">
              <td>{{ stat.created_at }}</td>
              <td v-if="link.commercial">
                <img :src="stat.image" alt="" class="img-thumbnail" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-else>
        <p>Нет переходов</p>
      </div>
    </div>
  </div>
</template>

<script>
import BaseLayout from "@/Layouts/BaseLayout.vue";

export default {
  layout: BaseLayout,

  props: {
    link: Object,
    stats: Object,
  },
};
</script>

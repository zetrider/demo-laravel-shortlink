<template>
  <div class="row">
    <div class="col-6 mx-auto">
      <form @submit.prevent="submit">
        <div class="mb-3">
          <input
            type="text"
            class="form-control"
            placeholder="Ваша ссылка"
            v-model="form.url"
          />
          <div class="invalid-feedback d-block" v-if="form.errors.url">
            {{ form.errors.url }}
          </div>
        </div>
        <div class="mb-3">
          <label for="basic-url" class="form-label">Короткая ссылка</label>
          <div class="input-group">
            <span class="input-group-text">
              {{ url }}/
            </span>
            <input type="text" class="form-control" v-model="form.slug" />
          </div>
          <div class="invalid-feedback d-block" v-if="form.errors.slug">
            {{ form.errors.slug }}
          </div>
          <div class="form-text">Или укажите свой вариант</div>
        </div>
        <div class="mb-3">
          <label for="basic-url" class="form-label">Ссылка активна до</label>
          <input type="date" class="form-control" v-model="form.expired_at" />
          <div class="invalid-feedback d-block" v-if="form.errors.expired_at">
            {{ form.errors.expired_at }}
          </div>
        </div>
        <div class="mb-3 form-check">
          <input
            type="checkbox"
            class="form-check-input"
            id="checkbox-commercial"
            v-model="form.commercial"
          />
          <label class="form-check-label" for="checkbox-commercial">
            Это коммерческая ссылка?
          </label>
          <div class="invalid-feedback d-block" v-if="form.errors.commercial">
            {{ form.errors.commercial }}
          </div>
        </div>
        <button
          type="submit"
          class="btn btn-primary"
          :disabled="form.processing"
        >
          Уменьшить
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import BaseLayout from "@/Layouts/BaseLayout.vue";

export default {
  layout: BaseLayout,

  props: {
    url: String,
    slug: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        url: null,
        slug: this.slug,
        expired_at: null,
        commercial: null,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(route("links.store"), {
        preserveScroll: true,
        onSuccess: () => {
          this.form.reset();
          this.$inertia.reload({ only: ["slug"] });
          this.form.slug = this.slug;
        },
      });
    },
  },
};
</script>

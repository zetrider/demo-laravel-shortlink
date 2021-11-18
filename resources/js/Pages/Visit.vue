<template>
  <div class="row">
    <div class="col-6 mx-auto text-center">
      <div class="alert">Ссылка откроется через {{ seconds }}</div>
      <img alt="" :src="image" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    image: String,
    url: String,
  },

  data() {
    return {
      timer: null,
      seconds: 5,
    };
  },

  methods: {
    start() {
      this.timer = setInterval(() => {
        this.seconds--;
      }, 1000);
    },
    stop() {
      clearTimeout(this.timer);
      window.location.href = this.url;
    },
  },

  watch: {
    seconds(time) {
      if (time === 0) {
        this.stop();
      }
    },
  },

  mounted() {
    this.start();
  },
  destroyed() {
    this.stop();
  },
};
</script>

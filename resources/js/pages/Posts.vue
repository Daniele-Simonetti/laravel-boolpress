<template>
    <div>Posts</div>
</template>

<script>
import Axios from "axios";
import Main from "../components/Main.vue";

export default {
  name: "Posts",
  components: {
    Main,
  },
  data() {
    return {
      cards: {
        posts: null,
        next_page_url: null,
        prev_page_url: null,
      },
    };
  },
  created() {
    this.getPosts("http://127.0.0.1:8000/api/posts/random");
  },
  methods: {
    changePage(swapPage) {
      let newPage = this.cards[swapPage];
      if (newPage) {
        this.getPosts(newPage);
      }
    },
    getPosts(newPage) {
      Axios.get(newPage).then((result) => {
        this.cards.posts = result.data.results.data;
        this.cards.next_page_url = result.data.results.next_page_url;
        this.cards.prev_page_url = result.data.results.prev_page_url;
      });
    },
  },
};
</script>

<style></style>

<template>
  <div class="container">
    <!-- <div class="row">
      <div class="col-12" v-for="(post, index) in posts" :key="index">
        <div class="card mb-3">
          <img class="card-img-top" :src="'/storage/' + post.image" :alt="post.title">
          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.content }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ post.updated_at }}</small></p>
          </div>
        </div>
      </div>
    </div> -->
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col" v-for="(post, index) in posts" :key="index">
        <div class="card">
          <img :src="'/storage/'+post.image" class="card-img-top" :alt="post.title">
          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.content }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3 bg-light">
      <ul class="list-inline bg-light">
        <li class="list-inline-item"> <button v-if="prev_page_url" class="btn btn-primary" @click="changePage('prev_page_url')">Prev</button></li>
        <li class="list-inline-item"> <button v-if="next_page_url" class="btn btn-primary" @click="changePage('next_page_url')">Next</button></li>
      </ul>
    </div>
  </div>
</template>

<script>
import Axios from 'axios';
export default {
  name: 'Main',
  data() {
    return {
      posts: null,
      next_page_url: null,
      prev_page_url: null,
    }
  },
  created() {
    this.getPosts('http://127.0.0.1:8000/api/posts');
  },
  methods: {
    changePage(swapPage) {
      let newPage = this[swapPage];
      if (newPage) {
        this.getPosts(newPage);
      }
    },
    getPosts(newPage) {
      Axios.get(newPage).then((result) => {
        this.posts = result.data.results.data;
        this.next_page_url = result.data.results.next_page_url;
        this.prev_page_url = result.data.results.prev_page_url;
    })
    }
  }
}
</script>

<style lang="scss">
.card {
  img {
    height: 172.35px;
  }
}
  .card-body {
    height: 300px;
    overflow: auto;
  }
</style>
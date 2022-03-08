<template>
  <div class="container">
    <div class="row">
      <div class="col-12" v-for="(post, index) in posts" :key="index">
        <div class="card mb-3">
          <img class="card-img-top" :src="'/storage/'+post.image" :alt="post.title">
          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.content }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ post.updated_at }}</small></p>
          </div>
        </div>
      </div>
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
    }
  },
  created() {
    Axios.get('http://127.0.0.1:8000/api/posts').then((result) => {
      this.posts = result.data.result.posts;
      console.log(this.posts);
    })
  }
}
</script>

<style>

</style>
<template>
  <div>
    <Header></Header>
    <!-- <Main></Main> -->
    <router-view></router-view>
  </div>
</template>

<script>
import Main from '../components/Main.vue';
import Header from '../components/Header.vue';

  export default {
    name: 'App',
    components: {
      Header,
    }
  }
</script>

<style>

</style>
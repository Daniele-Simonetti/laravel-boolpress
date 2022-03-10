<template>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li
              class="nav-item"
            v-for="item in menuItems"
            :key="item.id"
          >
            <router-link class="nav-link" :to="{ name: item.routeName}">{{item.label}}</router-link>
          </li>
        </ul>
            
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      logo: require("../../img/bag-shopping-solid.svg"),
      menuItems: [
        {
          label: "Home",
          routeName: "home",
        },
        {
          label: "Posts",
          routeName: "posts",
        },
        {
          label: "About",
          routeName: "about",
        },
        {
          label: "Contacts",
          routeName: "contacts",
        },
      ],
    };
  },
};
</script>

<style lang="scss"></style>

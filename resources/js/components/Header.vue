<template>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li
              class="nav-item"
            v-for="item in menuItems"
            :key="item"
          >
            <a href="#">{{ item.label }}</a>
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
          label: "Products",
          routeName: "products",
        },
        {
          label: "Chi Siamo",
          routeName: "about",
        },
      ],
    };
  },
};
</script>

<style lang="scss"></style>

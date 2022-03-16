<template>
  <div id="app">
    <b-container fluid>
      <NavBar/>
      <router-view class="text-center"/>
    </b-container>
  </div>
</template>

<script>
  import NavBar from './components/NavBar.vue';
  export default {
    components: {
      NavBar,
    },
  };
</script>

<style>
.container-fluid {
  padding: 0 !important;
}

#nav-collapse a.active-routes {
  color: white;
}
</style>
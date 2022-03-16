<template>
  <div>
    <BuscadorVuelos/>
    <Resultados/>
  </div>
</template>

<script>
  import BuscadorVuelos from '../components/BuscadorVuelos.vue';
  import Resultados from '../components/Resultados.vue';
  export default {
    components: {
      BuscadorVuelos,
      Resultados,
    },
    created() {
      if (!this.$store.state.busqueda) this.$router.push({ name: "vuelos" });
    }
  };
</script>

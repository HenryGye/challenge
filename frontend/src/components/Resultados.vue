<template>
  <div>
    <h3>Resultados de vuelos</h3>
    <div class="d-flex justify-content-center flex-wrap gap-5 mt-5 mb-5">
      <b-card-group deck v-for="vuelo in vuelos" :key="vuelo.id">
        <b-card style="max-width: 20rem;">
          <template #header>
            <h4 class="mb-0" v-html="$store.getters.setOrigenDestino">
              <!-- <b-icon icon="arrow-left-right"></b-icon> -->
            </h4>
          </template>

          <b-list-group flush>
            <b-list-group-item
              ><b-icon icon="clock"></b-icon> {{ vuelo.duracion.hora_salida }}
              <b-icon icon="arrow-right"></b-icon>
              {{ vuelo.duracion.hora_llegada }}
              {{ vuelo.duracion.dias }}</b-list-group-item
            >
            <b-list-group-item
              ><b-card-sub-title class="mb-2"
                ><b-icon icon="geo-alt"></b-icon>
                {{ vuelo.escala }}</b-card-sub-title
              ></b-list-group-item
            >
            <b-list-group-item
              ><b-card-sub-title class="mb-2"
                ><b-icon icon="info-circle"></b-icon>
                {{ vuelo.aerolinea }}</b-card-sub-title
              ></b-list-group-item
            >
          </b-list-group>

          <b-card-footer>USD ${{ vuelo.precio }}</b-card-footer>
        </b-card>
      </b-card-group>
    </div>
  </div>
</template>

<script>
import vuelos from "../assets/js/vuelos";
export default {
  data() {
    return {
      vuelos: vuelos
    };
  }
};
</script>

<template>
  <div class="p-5">
    <b-row
      cols="1"
      cols-sm="2"
      cols-md="4"
      cols-lg="6"
      align-v="end"
      style="row-gap: 1rem;"
      class="justify-content-center"
    >
      <b-col>
        <b-form-group id="select-origen" label="Ciudad de origen">
          <b-form-select
            v-model="selectOrigen"
            :options="optionsOrigen"
            class="form-control"
          ></b-form-select>
        </b-form-group>
      </b-col>
      <b-col>
        <b-form-group id="select-destino" label="Ciudad de destino">
          <b-form-select
            v-model="selectDestino"
            :options="optionsDestino"
            class="form-control"
          ></b-form-select>
        </b-form-group>
      </b-col>
      <b-col>
        <b-form-group id="dp-salida" label="Fecha de salida">
          <b-form-datepicker
            id="fs-datepicker"
            v-model="fechaSalida"
            class="form-control"
            placeholder="Salida"
            :date-format-options="{
              year: 'numeric',
              month: '2-digit',
              day: '2-digit'
            }"
            :min="minDateSalida"
          ></b-form-datepicker>
        </b-form-group>
      </b-col>
      <b-col>
        <b-form-group id="dp-retorno" label="Fecha de retorno">
          <b-form-datepicker
            id="fr-datepicker"
            v-model="fechaRetorno"
            class="form-control"
            placeholder="Retorno"
            :date-format-options="{
              year: 'numeric',
              month: '2-digit',
              day: '2-digit'
            }"
            :min="minDateRetorno"
          ></b-form-datepicker>
        </b-form-group>
      </b-col>
      <b-col class="w-auto d-flex gap-3">
        <b-form-group id="dp-b">
          <b-button @click="buscar" pill variant="primary"
            ><b-icon icon="search"></b-icon
          ></b-button>
        </b-form-group>
        <b-form-group id="dp-l">
          <b-button @click="limpiar" pill variant="outline-primary"
            ><b-icon icon="trash"></b-icon
          >Limpiar</b-button>
        </b-form-group>
      </b-col>
      <div class="w-100"></div>
      <b-col class="col-lg-6">
        <b-alert
          :show="dismissCountDown"
          dismissible
          variant="danger"
          @dismissed="dismissCountDown = 0"
          @dismiss-count-down="countDownChanged"
        >
          {{ mensajeError }}
        </b-alert>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  data() {
    const today = new Date();
    let anio = today.getFullYear();
    let dia = today.getDate();
    let _mes = today.getMonth() + 1;
    let mes = _mes < 10 ? "0" + _mes : _mes.toString;
    let hoy = anio + "-" + mes + "-" + dia;

    return {
      selectOrigen: this.$store.state.selectOrigen.selected, //this.$store.getters.selectOrigen
      optionsOrigen: this.$store.state.selectOrigen.options,
      selectDestino: this.$store.state.selectDestino.selected,
      optionsDestino: this.$store.state.selectDestino.options,
      fechaSalida: this.$store.state.fechaSalida,
      fechaRetorno: this.$store.state.fechaRetorno,
      seleccionado: "",
      dismissSecs: 2,
      dismissCountDown: 0,
      minDateSalida: hoy,
      minDateRetorno: hoy,
      mensajeError: ""
    };
  },
  methods: {
    onContext(ctx) {
      this.seleccionado = ctx.selectedYMD;
    },
    countDownChanged(dismissCountDown) {
      this.dismissCountDown = dismissCountDown;
    },
    buscar() {
      if (this.validarCampos()) {
        this.dismissCountDown = this.dismissSecs;
      } else {
        this.$store.dispatch("setearBusqueda", true);
        this.$store.dispatch("setearSelectOrigen", this.selectOrigen);
        this.$store.dispatch("setearSelectDestino", this.selectDestino);
        this.$store.dispatch("setearFechaSalida", this.fechaSalida);
        this.$store.dispatch("setearFechaRetorno", this.fechaRetorno);
        if (this.$route.name != 'resultadosVuelos')
          this.$router.push({ name: "resultadosVuelos" });
      }
    },
    validarCampos() {
      if (
        !this.selectOrigen ||
        !this.selectDestino ||
        !this.fechaSalida ||
        !this.fechaRetorno
      ) {
        this.mensajeError = "Debe seleccionar todos los campos";
        return true;
      }
      if (this.fechaSalida > this.fechaRetorno) {
        this.mensajeError = "Fecha salida inválida";
        return true;
      }
    },
    limpiar() {
      this.$store.dispatch("accionLimpiarCampos", null);
      if (this.$route.name != 'vuelos')
          this.$router.push({ name: "vuelos" });
    }
  }
};
</script>

<style>
.alert-dismissible .close {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  padding: 0.75rem 1.25rem;
  color: inherit;
}

button.close {
  padding: 0;
  background-color: transparent;
  border: 0;
}

.close {
  float: right;
  font-size: 1.5rem;
  font-weight: 700;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: 0.5;
}
</style>

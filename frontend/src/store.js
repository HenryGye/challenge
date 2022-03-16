import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    busqueda: false,
    selectOrigen: {
      selected: null,
      options: [
        { value: null, text: "Origen", disabled: true },
        { value: "1", text: "Guayaquil, Ecuador (GYE)" },
        { value: "2", text: "Quito, Ecuador (UIO)" },
        { value: "3", text: "Cuenca, Ecuador (CUE)" }
      ],
    },
    selectDestino: {
      selected: null,
      options: [
        { value: null, text: "Destino", disabled: true },
        { value: "4", text: "Los Ángeles, California (USA)" },
        { value: "5", text: "Sao Paulo, Brazil (BR)" },
        { value: "6", text: "Madrid, España (MAD)" }
      ],
    },
    fechaSalida: null,
    fechaRetorno: null
  },
  mutations: {
    UPDATE_BUSQUEDA(state, payload) {
      state.busqueda = payload
    },
    UPDATE_SELECT_ORIGEN(state, payload) {
      state.selectOrigen.selected = payload
    },
    UPDATE_SELECT_DESTINO(state, payload) {
      state.selectDestino.selected = payload
    },
    UPDATE_FECHA_SALIDA(state, payload) {
      state.fechaSalida = payload
    },
    UPDATE_FECHA_RETORNO(state, payload) {
      state.fechaRetorno = payload
    },
    UPDATE_LIMPIAR_CAMPOS(state, payload) {
      state.busqueda = false
      state.selectOrigen.selected = null
      state.selectDestino.selected = null
      state.fechaSalida = null
      state.fechaRetorno = null
    }
  },
  actions: {
    setearBusqueda(context, payload) {
      context.state.busqueda = payload
      context.commit('UPDATE_BUSQUEDA', context.state.busqueda)
    },
    setearSelectOrigen(context, payload) {
      context.state.selectOrigen.selected = payload
      context.commit('UPDATE_SELECT_ORIGEN', context.state.selectOrigen.selected)
    },
    setearSelectDestino(context, payload) {
      context.state.selectDestino.selected = payload
      context.commit('UPDATE_SELECT_DESTINO', context.state.selectDestino.selected)
    },
    setearFechaSalida(context, payload) {
      context.state.fechaSalida = payload
      context.commit('UPDATE_FECHA_SALIDA', context.state.fechaSalida)
    },
    setearFechaRetorno(context, payload) {
      context.state.fechaRetorno = payload
      context.commit('UPDATE_FECHA_RETORNO', context.state.fechaRetorno)
    },
    accionLimpiarCampos(context, payload) {
      context.commit('UPDATE_LIMPIAR_CAMPOS', payload)
    }
  },
  getters: {
    setOrigenDestino: function (state) {
      let ciudadOrigen = state.selectOrigen.options.find(e => e.value === state.selectOrigen.selected)
      let ciudadDestino = state.selectDestino.options.find(e => e.value === state.selectDestino.selected)
      return ciudadOrigen.text + ` <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" aria-label="arrow left right" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-arrow-left-right b-icon bi"><g><path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"></path></g></svg> `+ ciudadDestino.text
    }
  }
})
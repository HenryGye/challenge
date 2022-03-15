const { createVuePlugin } = require('vite-plugin-vue2');

module.exports = {
  plugins: [createVuePlugin()],
  server: {
    host: '0.0.0.0'
  }
};
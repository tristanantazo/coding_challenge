window.Axios = require('axios');

import App from './components/app'
import Vue from 'vue'

new Vue({
    el: '#app',
    components: { App },
    template: `<App/>`
});
import './bootstrap';
import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import App from './voting/app';
const path = document.getElementById('script_intact').getAttribute('src');

// const app = new Vue({
//     el: '#app_intact',
//     render: h => h(App, {props: { trackerId })
//     //components: { App }
// });


new Vue({
  render: h => h(App, {
    props: {
      path
    }
  })
}).$mount('#app_intact');
import './bootstrap';

import Vue from 'vue';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap and BootstrapVue CSS files (order is important)
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

// // Make BootstrapVue available throughout your project
// Vue.use(BootstrapVue)
// // Optionally install the BootstrapVue icon components plugin
// Vue.use(IconsPlugin)

import App from './voting/app';

const app = new Vue({
    el: '#app_intact',
    render: h => h(App) // Dynamically render the App component
    //components: { App }
});


// export function add(a, b) {
//     return a + b;
// }

// export function greet(name) {
//     return `Hello, ${name}!`;
// }

// // Example usage (you can remove this later)
// console.log(add(2, 3)); // 5
// console.log(greet('World')); // Hello, World!
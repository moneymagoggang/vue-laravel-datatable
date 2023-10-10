/**
 * Vue
 */
// import {VueSelect} from "vue-select";
import PrimeVue from "primevue/config";
import "primevue/resources/themes/saga-blue/theme.css";
import "primevue/resources/primevue.min.css";
// import "primeicons/primeicons.css";
import "primevue/resources/themes/lara-light-blue/theme.css";
import { createApp } from "vue/dist/vue.esm-bundler.js";

import ExampleComponent from "./components/ExampleComponent.vue";
import Pagination from "vue-pagination/src/main.js";

const app = createApp({});
app.use(PrimeVue);

app.component("pagination", Pagination);
app.component("example-component", ExampleComponent);

const root = document.querySelector("#app");

if (root) {
    app.mount(root);
}

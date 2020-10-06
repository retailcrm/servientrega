import Vue from "vue";
import VueI18n from 'vue-i18n'
import App from "./App";
import router from "./router";

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

Vue.use(VueMaterial)
Vue.use(VueI18n);

const messages = window.app_translations;
export const i18n = new VueI18n({
    locale: window.app_locale,
    messages
});

new Vue({
    i18n,
    components: {
        App
    },
    template: "<App/>",
    router
}).$mount("#app");

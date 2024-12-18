import Vue from "vue";
import VueI18n from 'vue-i18n'
import App from "./App";
import router from "./router";

import '@ui-kit/core/dist/ui-kit.css';
import UiLibrary from '@ui-kit/core/dist/ui-kit.common';

Vue.use(UiLibrary);
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

import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../pages/Index";
import SettingsConnection from "../pages/SettingsConnection";
import NotFound from "../pages/NotFound";
import SettingsAccount from "../pages/SettingsAccount";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Index },
        { path: "/settings/connection", component: SettingsConnection },
        { path: "/settings/account", component: SettingsAccount },
        { path: "*", component: NotFound },
    ],
});

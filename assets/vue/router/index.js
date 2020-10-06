import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../pages/Index";
import Settings from "../pages/Settings";
import NotFound from "../pages/NotFound";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Index },
        { path: "/settings", component: Settings },
        { path: "*", component: NotFound },
    ],
});

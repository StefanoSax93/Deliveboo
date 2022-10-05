import Home from './Pages/home.vue';
import PageNotFound from './Pages/PageNotFound.vue';
import TheMenu from './Pages/TheMenu.vue';



export const routes = [
    { path: "/", component: Home, name: "home" },
    { path: "/:slug", component: TheMenu, name: "TheMenu"  },
    { path: "*", component: PageNotFound  },
];


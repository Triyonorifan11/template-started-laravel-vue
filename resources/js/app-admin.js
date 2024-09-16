import './bootstrap';
// load vue
import {createApp} from "vue";
import routes from "./router/app-admin";

// components
import MainApp from "./components/App.vue";
import globalPlugin from "@/functions/global-plugin.js";

// create app vue
const app = createApp({
    MainApp
});

app.component("main-app", MainApp);

app.use(routes);

app.use(globalPlugin);

app.mount("#main-app");
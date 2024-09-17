import './bootstrap';
// load vue
import {createApp} from "vue";
import routes from "./router/app-landing";

// components
import MainApp from "./components/App.vue";
import globalPlugin from "@/functions/global-plugin.js";
import LoaderGlobal from './components/templates/LoaderGlobal.vue';

import mainStore from "@/store/index.js";

// create app vue
const app = createApp({
    MainApp
});

app.component("landing-app", MainApp);
app.component("loader-app", LoaderGlobal);

app.use(routes);

app.use(globalPlugin);

app.use(mainStore);

app.mount("#landing-app");
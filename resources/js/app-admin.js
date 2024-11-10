import './bootstrap';
// load vue
import {createApp} from "vue";
import routes from "./router/app-admin";

// components
import MainApp from "./components/App.vue";
import globalPlugin from "@/functions/global-plugin.js";
import LoaderGlobal from './components/templates/LoaderGlobal.vue';
import Datatable from '@/components/templates/Datatable.vue';
import SelectSingle from '@/components/templates/SelectSingle.vue';
import SelectMultiple from '@/components/templates/SelectMultiple.vue';

import mainStore from "@/store/index.js";

// create app vue
const app = createApp({
    MainApp
});

app.component("main-app", MainApp);
app.component("loader-app", LoaderGlobal);
app.component("app-datatable", Datatable);
app.component("app-select-single", SelectSingle);
app.component("app-select-multiple", SelectMultiple);

app.use(routes);

app.use(globalPlugin);

app.use(mainStore);

app.mount("#main-app");
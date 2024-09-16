import profileStore from "@/store/profile.js";
import Vuex from 'vuex';

export default new Vuex.createStore({
    modules: {
        profile: profileStore,       
    }
});

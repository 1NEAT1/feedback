import Vue from 'vue'
import Vuex from 'vuex'

// подключенные модули
import feedback from "./modules/feedback/feedback";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    getters: {},
    modules: {
        feedback
    }
});
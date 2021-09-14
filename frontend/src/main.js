import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store/store';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import bootstrap from 'bootstrap/dist/css/bootstrap.css';
import "./assets/css/app.css";

Vue.use(Toast);
Vue.use(bootstrap);

Vue.config.productionTip = false;


new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')

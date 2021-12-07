import { createApp } from 'vue'
import App from './App.vue'
import router from './router/router.js'
import 'bootstrap/dist/css/bootstrap.min.css'

// 
import BaseCard from './components/button/BaseCard.vue';
import BaseButton from './components/button/BaseButton.vue';
import BaseDialog from './components/button/BaseDialog.vue';

const app = createApp(App);
app.component('base-card', BaseCard);
app.component('base-button', BaseButton);
app.component('base-dialog', BaseDialog);

app.use(router);
app.mount('#app');
import { createApp } from 'vue';
import Contacts from './components/Contacts.vue';

const app = createApp({});
app.component('contacts', Contacts);
app.mount('#app');
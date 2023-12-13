import './bootstrap';

import { createApp } from 'vue';
import Dashboard from '@/pages/Dashboard.vue';

const app = createApp({});

app.component('Dashboard', Dashboard);

app.mount('#app');
import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import CreateProduct from './components/CreateProduct.vue';

app.component('example-component', ExampleComponent);
app.component('create-prod', CreateProduct);

app.mount('#app');

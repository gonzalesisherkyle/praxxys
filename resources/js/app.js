
import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import CreateProduct from './components/CreateProduct.vue';
import ViewProduct from './components/ViewProduct.vue';
import EditProduct from './components/EditProduct.vue';
import VideoPlayer from './components/VideoPlayer.vue';

createApp(CreateProduct).mount("#create")
createApp(ViewProduct).mount("#view")
createApp(EditProduct).mount("#edit")
createApp(VideoPlayer).mount("#video")
createApp(ExampleComponent).mount("#example")


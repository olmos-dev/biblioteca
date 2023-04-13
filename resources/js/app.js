import './bootstrap';

//se importa vue 3
import {createApp} from 'vue'

//se importar los componentes de vue
import HolaMundo from '../js/components/HolaMundo.vue'
import LibroDelete from '../js/components/LibroDelete.vue'

const app = createApp({});

//se declaran los componentes en la aplicación
app.component('HolaMundo',HolaMundo)
    .component('LibroDelete',LibroDelete)

app.mount('#app');
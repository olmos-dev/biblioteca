import './bootstrap';

//se importa vue 3
import {createApp} from 'vue'

//se importar los componentes de vue
import HolaMundo from '../js/components/HolaMundo.vue'
import LibroDelete from '../js/components/LibroDelete.vue'
import StockDelete from '../js/components/StockDelete.vue'
import StockIncrease from '../js/components/StockIncrease.vue'
import StockDecrementar from '../js/components/StockDecrementar.vue'
import PrestamoEstado from '../js/components/PrestamoEstado.vue'
import PrestamoDelete from '../js/components/PrestamoDelete.vue'
import AsignarRol from '../js/components/AsignarRol.vue'

const app = createApp({});

//se declaran los componentes en la aplicación
app.component('HolaMundo',HolaMundo)
    .component('LibroDelete',LibroDelete)
    .component('StockDelete',StockDelete)
    .component('StockIncrease',StockIncrease)
    .component('StockDecrementar',StockDecrementar)
    .component('PrestamoEstado',PrestamoEstado)
    .component('PrestamoDelete',PrestamoDelete)
    .component('AsignarRol',AsignarRol)
    
app.mount('#app');

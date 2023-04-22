<template>
    <button class="btn btn-primary btn-sm" @click="estado($event)"><i class="fas fa-sync-alt"></i></button>
</template>

<script>
import axios from 'axios';

export default {
    name:'PrestamoEstado',
    props:{
        prestamo:Object
    },
    methods:{
        async estado($event){
            try {
                const response = await axios.patch(`/biblioteca/prestamos/estado/${this.prestamo.id}`);
                if(response.status == 200){
                    //es para renderizar el dom y cambien los valores en la fila de la tabla seleccionada
                    var padre = $event.target.parentNode.parentNode;
                    var hijoEstado = padre.childNodes[5].childNodes[0];
                    hijoEstado.classList.replace('badge-warning','badge-success')
                    hijoEstado.textContent = 'Entregado'
                    //muestra una alerta del estao del
                    toastr.success('El libro se ha devuelto', 'Biblioteca')
                    console.log(response.data)
                }
            } catch (error) {
                console.log(error)
                toastr.error('No se pudo procesar la solicitud', 'Error del servidor')
            }
        } 
    }
}
</script>
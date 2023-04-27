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
                //se hace una petcion axios para cambiar el estado del libro
                let response = await axios.patch(`/biblioteca/prestamos/estado/${this.prestamo.id}`);
                //se verifica la respuesta del servidor, dependiendo de la accion es estado del prestamo cambiara
                
                //es para renderizar el dom y cambien los valores en la fila de la tabla seleccionada
                var padre = $event.target.parentNode.parentNode;
                var hijoEstado = padre.childNodes[6]
                var accederHijo = hijoEstado.childNodes[0]
                
                if(response.status == 200){
                    accederHijo.classList.replace('badge-warning','badge-success')
                    accederHijo.textContent = 'Entregado'
                    toastr.success('Libro se ha entregado', 'Biblioteca')
                }else{
                    accederHijo.classList.replace('badge-success','badge-warning')
                    accederHijo.textContent = 'Prestado'
                    toastr.warning('Libro se ha Prestado', 'Biblioteca')
                }
            } catch (error) {
                console.log(error)
                toastr.error('No se pudo procesar la solicitud', 'Error del servidor')
            }
        } 
    }
}
</script>
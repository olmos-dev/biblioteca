<template>
    <div>
        <button class="btn btn-primary btn-sm" @click="asignar($event)"><i class="fas fa-sync-alt"></i></button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name:'AsignarRol',
    props:{
        usuario:Object
    },
    methods: {
        async asignar($event){
            try {
                const response = await axios.put(`/biblioteca/roles/${this.usuario.id}`)
                if(response.status == 200){
                    //renderizar rol asignado en el dom
                    var nodo = $event.target
                    var padre = nodo.parentNode.parentNode.parentNode
                    var hijo = padre.childNodes[2]
                    hijo.textContent = response.data.respuesta
                    //alerta
                    toastr.info('Rol asignado','Biblioteca')
                }
            } catch (error) {
                console.log(error)
                toastr.error('No se pudo procesar la solicitud','Error')
            }
        }
    },
}
</script>
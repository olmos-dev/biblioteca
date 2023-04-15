<template>
    <!--Componente el boton eliminar libro-->
    <button class="btn btn-danger btn-sm" id="eliminar" @click="eliminar(stock)"><i class="fas fa-trash-alt"></i></button>
</template>

<script>
export default {
    name:'StockDelete',
    //recibe el objecto libro desde laravel a travez de props de vue
    props: {
        stock: Object
    },
    methods:{
        //es el evento click, cuando el usuario pulsa eliminar en el boton
        eliminar(stock){
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Está acción no se puede revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //se llama la funcion solicitud axios delete para eliminar el libro
                    axios.delete(`/biblioteca/stock/${stock.id}`)
                    .then(function (response) {
                        //si el codigo de respuesta del servidor es 200, eliminar del dom el libro
                        if(response.status == 200){
                            //se obtiene la posicion del dom del libro que se va a eliminar a traves de data-isbn
                            const renderizar = document.querySelectorAll(`[data-id="${response.data.id}"]`)
                            //se obtiene un array, se le pasa la posicion 0 para que sea eliminado del dom
                            renderizar[0].remove()
                            toastr.success('Libro se ha eliminado del stock', 'Eliminado')
                        }else{
                            toastr.error('No se pudo eliminar', 'Error del servidor')
                        } 
                    })
                    .catch(function (error) {
                        toastr.error('No se pudo procesar la solicitud', 'Error del servidor')
                    });
                }
            })
        },
    }
}
</script>
<template>
    <!--Componente el boton eliminar libro-->
    <button class="btn btn-danger btn-sm" id="eliminar" @click="eliminar()"><i class="fas fa-trash-alt"></i></button>
</template>

<script>
export default {
    name:'LibroDelete',
    //recibe el objecto libro desde laravel a travez de props de vue
    props: {
        libro: Object
    },
    methods:{
        //se realiza la peticion axios para elimianr el libro
        async solicitud(libro){
            try {    
                const response = await axios.delete(`/biblioteca/libros/${libro.isbn}`)
                console.log(response.data)
            } catch (error) {
                toastr.error('No se pudo procesar la solicitud', 'Oops...')
            }
        },
        //es el evento click, cuando el usuario pulsa eliminar en el boton
        eliminar(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //se llama la funcion async solicitud axios delete para eliminar el libro
                    this.solicitud(this.libro)
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        },
       
    }
}
</script>
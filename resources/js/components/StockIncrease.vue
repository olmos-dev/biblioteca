<template>
     <button class="btn btn-primary btn-sm mr-2 mb-1 mb-md-0" @click="incrementar($event)"><i class="fas fa-angle-up"></i></button>
</template>

<script>
export default {
    name:'StockIncrease',
    props:{
        stock:Object
    },
    methods:{
        async incrementar($event){
            try {
                const response = await axios.get(`/biblioteca/stock/incrementar/${this.stock.id}`);
                
                var padre = $event.target.parentNode.parentNode;
                var hijoCantidad = padre.childNodes[4];
                var hijoDisponible = padre.childNodes[5];
                hijoCantidad.textContent = response.data.cantidad
                hijoDisponible.textContent = response.data.disponible

            } catch (error) {
                console.log(error)
                toastr.error('No se pudo incrementar', 'Error del servidor')
            }
        }
    }
}
</script>
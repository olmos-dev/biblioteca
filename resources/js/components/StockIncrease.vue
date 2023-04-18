<template>
     <button class="btn btn-primary btn-sm mr-2 mb-1 mb-md-0" @click="incrementar()"><i class="fas fa-angle-up"></i></button>
</template>

<script>
export default {
    name:'StockIncrease',
    props:{
        stock:Object
    },
    methods:{
        async incrementar(){
            try {
                const response = await axios.get(`/biblioteca/stock/incrementar/${this.stock.id}`);
                var add = document.getElementById('cantidad');
                var available = document.getElementById('disponible')
                add.textContent = response.data.cantidad
                available.textContent = response.data.disponible

            } catch (error) {
                console.log(error)
                toastr.error('No se pudo incrementar', 'Error del servidor')
            }
        }
    }
}
</script>
<template>
    <button class="btn btn-primary btn-sm mr-2 mb-1 mb-md-0" @click="decrementar()"><i class="fas fa-angle-down"></i></button>
</template>

<script>
export default {
   name:'StockIncrease',
   props:{
       stock:Object
   },
   methods:{
       async decrementar(){
           try {
               const response = await axios.get(`/biblioteca/stock/decrementar/${this.stock.id}`);
               var rest = document.getElementById('cantidad');
               var available = document.getElementById('disponible')
               rest.textContent = response.data.cantidad
               available.textContent = response.data.disponible

           } catch (error) {
               console.log(error)
               toastr.error('No se puede decrementar más', '')
           }
       }
   }
}
</script>
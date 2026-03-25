<template>
  <div>
    <div class="row mb-4">
        <div class="col-12">
            <input type="text" v-model="ci" placeholder="Cedula de Identidad" class="form-control col-8">
            <button class="btn btn-success col-3 ml-2" @click="getSearchCi()">Consultar</button>
        </div>
    </div>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Entrega</th>
        </tr>
      </thead>
      <tbody>
        <tr  class="text-center">
          <td>{{ beneficiario.nombre_completo || 'N/A' }}</td>
          <td>{{ beneficiario.ci || 'N/A' }}</td>
          <td v-for="mes in meses" :key="mes.label">
            <div v-if="beneficiario">
                {{ tieneEntrega(beneficiario, mes.entrega) ? getEntrega(beneficiario, mes.entrega) : 'NO TIENE ENTREGA' }}
            </div>
            <div v-else>
                nn
            </div>
        </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return {
            beneficiario: '',
            ci: '',
             meses: [
                { label: 'Ene-Feb', entrega: '1RA ENTREGA 2024'},
                { label: 'Mar-Abr', entrega: '2DA ENTREGA 2024'},
                { label: 'May', entrega: '3RA ENTREGA 2024'},
                { label: 'Jun-Jul', entrega: '4TA ENTREGA 2024'},
                { label: 'Ago', entrega: '5TA ENTREGA 2024'},
                { label: 'Sep-oct', entrega: '6TA ENTREGA 2024'},
                { label: 'Nov-Dic', entrega: '7MA ENTREGA 2024'},
            ]
        }
    },
    methods: {
        tieneEntrega(beneficiario, nombreEntrega){
            return beneficiario.entregas.some(
                e => e.entrega === nombreEntrega
            );
        },
        getEntrega(beneficiario, mes){
            const entrega = beneficiario.entregas.find(e => e.entrega === mes);
            if(entrega){
                return `${entrega.entrega} - ${entrega.estado} - ${entrega.barrio.nombre}`
            }
        },
        getSearchCi(){
            axios.get(`/api/reportes/ci/${this.ci}`)
                .then(response => {
                    this.beneficiario = response.data;
                    console.log(this.beneficiario);
                })
                .catch(error => {
                    console.error('Error al obtener los datos:', error);
                });
        }
    }
}
</script>

<style>

</style>

<template>
  <div>
    <div class="row">
        <div class="col-12">
            <select name="barrio" id="barrio" class="form-control col-8">
                <option value="">Seleccione un barrio</option>
                <option v-for="barrio in barrios" :key="barrio.id" :value="barrio.id">
                    {{ barrio.nombre}}
                </option>
            </select>
            <button class="btn btn-success col-2" @click="getEntregas">Consultar</button>
        </div>
    </div>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Ene</th>
        <th>Feb</th>
        <th>Mar</th>
        <th>Abr</th>
        <th>May</th>
        <th>Jun</th>
        <th>Jul</th>
        <th>Ago</th>
        <th>Sep</th>
        <th>Oct</th>
        <th>Nov</th>
        <th>Dic</th>
        <th>SubTotal</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="beneficiario in items" :key="beneficiario.id" class="text-center">
          <td>{{ beneficiario.nombre_completo }}</td>
          <td>{{ beneficiario.ci }}</td>
          <td v-for="mes in meses" :key="mes.label">
            {{ tieneEntrega(beneficiario, mes.entrega) ? '1' : '0' }}
        </td>
            <td>{{ getSubTotal(beneficiario)}}</td>
        </tr>
        <tr>
            <td colspan="14" class="text-right">
                <strong>Total</strong>
            </td>
            <td>{{ totalGeneral }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import axios from 'axios';
export default {
    props: {
        barrios: {
            type: Array,
            default: () => []
        }
    },
    data(){
        return {
            items: [],
            contador: 0,
            sumaTotal:0,
            meses: [
                { label: 'Ene', entrega: '1RA ENTREGA 2024'},
                { label: 'Feb', entrega: '1RA ENTREGA 2024'},

                { label: 'Mar', entrega: '2DA ENTREGA 2024'},
                { label: 'Abr', entrega: '2DA ENTREGA 2024'},

                { label: 'May', entrega: '3RA ENTREGA 2024'},

                { label: 'Jun', entrega: '4TA ENTREGA 2024'},
                { label: 'Jul', entrega: '4TA ENTREGA 2024'},

                { label: 'Ago', entrega: '5TA ENTREGA 2024'},

                { label: 'Sep', entrega: '6TA ENTREGA 2024'},
                { label: 'Oct', entrega: '6TA ENTREGA 2024'},

                { label: 'Nov', entrega: '7MA ENTREGA 2024'},
                { label: 'Dic', entrega: '7MA ENTREGA 2024'},
            ]
        }
    },
    mounted(){

    },
    methods:{
        getEntregas(){
            this.sumaTotal = 0;
            axios.get('/api/reportes',{
                params: {
                    barrio_id: document.getElementById('barrio').value
                }
            })
            .then(res => {
                this.items = res.data;
            })
            .catch(err => console.error(err));
        },
        tieneEntrega(beneficiario, nombreEntrega){
            return beneficiario.entregas.some(
                e => e.entrega === nombreEntrega
            );
        },
        getSubTotal(beneficario){
            return this.meses.reduce((total, mes) => {
                return total + (this.tieneEntrega(beneficario, mes.entrega)? 1 : 0)
            },0)
        }
    },
    computed: {
        totalGeneral(){
            return this.items.reduce((sum, beneficiario) => {
                return sum + this.getSubTotal(beneficiario);
            },0)
        }
    }
};
</script>

<style>
</style>

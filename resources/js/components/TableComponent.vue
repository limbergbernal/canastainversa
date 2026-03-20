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
            <td>{{ checkEntrega(beneficiario,'1RA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'1RA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'2DA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'2DA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'3RA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'4TA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'4TA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'5TA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'6TA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'6TA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'7MA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ checkEntrega(beneficiario,'7MA ENTREGA 2024', 1) ? '1' : '0'}}</td>
            <td>{{ getContador() }}</td>
        </tr>
        <tr>
            <td colspan="14" class="text-right">
                <strong>Total</strong>
            </td>
            <td>{{ resultado() }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
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
            sumaTotal:0
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
        checkEntrega(beneficiario, nombreEntrega, canasta){
            let response = beneficiario.entregas.some(
                e => e.entrega === nombreEntrega
            );
            if(response){
                this.contador += canasta;
            }
            return response;
        },
        getContador(){
            console.log(this.sumaTotal);
            let temp = this.contador;
            this.sumaTotal = this.sumaTotal + temp;
            this.contador = 0;
            return temp;
        },
        resultado(){
            return this.sumaTotal;
        }
    }
};
</script>

<style>
</style>

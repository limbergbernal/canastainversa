<template>
    <div>
        <div class="row">
            <div class="col-12">
                <select name="distrito" id="distrito" class="form-control col-8">
                    <option value="">Seleccione un Distrito</option>
                    <option v-for="distrito in distritos" :key="distrito.id" :value="distrito.id">
                        {{ distrito.distrito }}
                    </option>
                </select>
                <button class="btn btn-success col-2" @click="getCargar()">
                    Consultar
                </button>
            </div>
        </div>
        <div v-for="barrio in barrios" :key="barrio.id">
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th colspan="15">{{ barrio.nombre }}</th>
                    </tr>
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
                    <tr v-for="beneficiario in beneficiarios.filter( b => b.barrio_id === barrio.id)" :key="beneficiario.id" class="text-center">
                        <td>{{ beneficiario.nombre_completo }}</td>
                        <td>{{ beneficiario.ci }}</td>
                        <td v-for="mes in meses" :key="mes.label">
                            {{ tieneEntrega(beneficiario, mes.entrega) ? "1" : "0" }}
                        </td>
                        <td>{{ getSubTotal(beneficiario) }}</td>
                    </tr>
                    <tr>
                        <td colspan="14" class="text-right">
                            <strong>Total</strong>
                        </td>
                        <td>{{ totalGeneral }}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    props: {
        distritos: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            barrios: [],
            beneficiarios: [],
            contador: 0,
            sumaTotal: 0,
            meses: [
                { label: "Ene", entrega: "1RA ENTREGA 2025" },
                { label: "Feb", entrega: "1RA ENTREGA 2025" },
                { label: "Mar", entrega: "1RA ENTREGA 2025" },
                { label: "Abr", entrega: "1RA ENTREGA 2025" },

                { label: "May", entrega: "2DA ENTREGA 2025" },
                { label: "Jun", entrega: "2DA ENTREGA 2025" },
                { label: "Jul", entrega: "2DA ENTREGA 2025" },
                { label: "Ago", entrega: "2DA ENTREGA 2025" },

                { label: "Sep", entrega: "3RA ENTREGA 2025" },
                { label: "Oct", entrega: "3RA ENTREGA 2025" },
                { label: "Nov", entrega: "3RA ENTREGA 2025" },
                { label: "Dic", entrega: "3RA ENTREGA 2025" },
            ],
        };
    },
    mounted() { },
    methods: {
        getCargar() {
            this.sumaTotal = 0;
            axios
                .get("/api/reportes/distritos", {
                    params: {
                        distrito_id: document.getElementById("distrito").value,
                    },
                })
                .then((res) => {
                    this.barrios = res.data.barrios;
                    this.beneficiarios = res.data.beneficiarios;
                })
                .catch((err) => console.error(err));
        },
        tieneEntrega(beneficiario, nombreEntrega) {
            return beneficiario.entregas.some((e) => e.entrega === nombreEntrega && (e.estado === "ENTREGADO" || e.estado === "RESAGADO"));
        },
        getSubTotal(beneficario) {
            return this.meses.reduce((total, mes) => {
                return total + (this.tieneEntrega(beneficario, mes.entrega) ? 1 : 0);
            }, 0);
        },
    },
    computed: {
        totalGeneral() {
            return this.beneficiarios.reduce((sum, beneficiario) => {
                return sum + this.getSubTotal(beneficiario);
            }, 0);
        },
    },
};
</script>

<style></style>

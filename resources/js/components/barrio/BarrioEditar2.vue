<template>
    <Modal v-model="showModal" size="md">
        <template #header>
            <h5 class="modal-title">Editar Barrio</h5>
        </template>
        <form id="formBarrio" @submit.prevent="guardar">
        <div class="form-horizontal">
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-control" id="tipo" v-model="barrio.tipo">
                    <option value="" selected>Seleccione un Tipo</option>
                    <option v-for="tipo in TIPO_BARRIO" :key="tipo.value" :value="tipo.value">
                        {{ tipo.label }}
                    </option>
                </select>
                <div v-if="errors.tipo" class="form-control-feedback">
                    {{ errors.tipo[0] }}
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" v-model="barrio.nombre" placeholder="Nombre del Barrio/Comunidad">
                <div v-if="errors.nombre" class="form-control-feedback">
                    {{ errors.nombre[0] }}
                </div>
            </div>
            <div class="form-group">
                <label for="distrito" class="form-label">Distrito</label>

                <select class="form-control" id="distrito" v-model="barrio.distrito_id">
                    <option value="">Seleccione un Distrito</option>
                    <option v-for="distrito in DISTRITOS" :key="distrito.value" :value="distrito.value">{{ distrito.label }}</option>
                </select>
                <div v-if="errors.distrito_id" class="form-control-feedback">
                    {{ errors.distrito_id[0] }}
                </div>
            </div>
            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-control" v-model="barrio.estado">
                    <option value="">Seleccione un Estado</option>
                    <option v-for="estado in ESTADOS" :key="estado.value" :value="estado.value">{{ estado.label }}</option>
                </select>
                <div v-if="errors.estado" class="form-control-feedback">
                    {{ errors.estado[0] }}
                </div>
            </div>

        </div>
        </form>
        <template #footer>
            <button class="btn btn-secondary" @click="showModal = false">Cancelar</button>
            <button type="submit" form="formBarrio" class="btn btn-primary" :disabled="loading">{{ barrio.id ? 'Actualizar' : 'Guardar'  }}</button>
        </template>

    </Modal>
</template>
<script setup>
import Modal from "@/components/UI/Modal.vue";
import { computed, onMounted, onUnmounted, ref } from "vue";
import axios from "axios";
import { TIPO_BARRIO, DISTRITOS, ESTADOS } from "../../constants/options";
import { useForm } from "../composables/useForm";

const showModal = ref(false);

const {form: barrio,errors, reset, setData, loading, submit} = useForm({
    id: null,
    tipo: "Barrio",
    nombre: "",
    distrito_id: "",
    estado: "Activo"
});

const isEditar = computed(() => !!barrio.id);

const openModal = async(event) =>{
    const id = event.detail.id;
    showModal.value = true;
    if(id){
        await obtenerBarrio(id);
    }else{
        reset();
    }
}

const obtenerBarrio = async(id) => {
    try{
        const response = await axios.get(`/api/barrio/${id}`);
        setData(response.data);

    }catch(error){
        console.error("Error al obtener barrio", error);
    }
}
const guardar = async() => {
    const url = isEditar.value
                ? `/api/barrio/${barrio.id}`
                : "/api/barrio";
    const method = isEditar.value ? "put" : "post";

    const res = await submit(url, method);
    if(res){
        reset();
        showModal.value = false;
        window.dispatchEvent(new CustomEvent("barrio-guardado", {detail: res}));
    }
}
onMounted(() => {
    window.addEventListener("editar-barrio", openModal);
});
onUnmounted(() => {
    window.removeEventListener("editar-barrio", openModal);
})
</script>

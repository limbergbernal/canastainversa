<template>
    <Modal v-model="showModal" size="md">
        <template #header>
            <h5 class="modal-title">Editar Barrio</h5>
        </template>
        <div class="form-horizontal">
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-control" id="tipo" v-model="barrio.tipo">
                    <option value="" selected>Seleccione un Tipo</option>
                    <option v-for="tipo in TIPO_BARRIO" :key="tipo.value" :value="tipo.value">
                        {{ tipo.label }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" v-model="barrio.nombre" placeholder="Nombre del Barrio/Comunidad">
            </div>
            <div class="form-group">
                <label for="distrito" class="form-label">Distrito</label>

                <select class="form-control" id="distrito" v-model="barrio.distrito_id">
                    <option value="">Seleccione un Distrito</option>
                    <option v-for="distrito in DISTRITOS" :key="distrito.value" :value="distrito.value">{{ distrito.label }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-control" v-model="barrio.estado">
                    <option value="">Seleccione un Estado</option>
                    <option v-for="estado in ESTADOS" :key="estado.value" :value="estado.value">{{ estado.label }}</option>
                </select>
            </div>

        </div>
        <template #footer>
            <button class="btn btn-secondary" @click="showModal = false">Cancelar</button>
            <button class="btn btn-primary">Guardar</button>
        </template>
    </Modal>
</template>
<script setup>
import Modal from "@/components/UI/Modal.vue";
import { onMounted, onUnmounted, ref } from "vue";
import axios from "axios";
import { TIPO_BARRIO, DISTRITOS, ESTADOS } from "../../constants/options";

const showModal = ref(false);

const barrio = ref({
    tipo: "Barrio",
    nombre: "",
    distrito: "",
    estado: "Activo"
});

const openModal = async(event) =>{
    const id = event.detail.id;
    showModal.value = true;
    await obtenerBarrio(id);
}

const obtenerBarrio = async(id) => {
    try{
        const response = await axios.get(`/api/barrio/${id}`);
        barrio.value = response.data;
    }catch(error){
        console.error("Error al obtener barrio", error);
    }
}

onMounted(() => {
    window.addEventListener("editar-barrio", openModal);
});
onUnmounted(() => {
    window.removeEventListener("editar-barrio", openModal);
})
</script>

<template>
    <Modal v-model="showModal" size="md">
        <template #header>
            <h5 class="modal-title">Editar Barrio</h5>
        </template>
        <h5>CONTENIDO....</h5>
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

const showModal = ref(false);

const barrio = ref({
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
        const response = await axios.get(`/api/barrios/${id}`);
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

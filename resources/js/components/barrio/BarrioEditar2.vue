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

const showModal = ref(false);

const openModal = () =>{
    showModal.value = true;
}

onMounted(() => {
    window.addEventListener("editar-barrio", openModal);
});
onUnmounted(() => {
    window.removeEventListener("editar-barrio", openModal);
})
</script>

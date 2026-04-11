<template>
    <BaseModal v-model="open">
        <template #header>
            <h5 class="modal-title">Confirmacion</h5>
        </template>
        <p>{{ message }}</p>

        <template #footer>
            <button class="btn btn-secondary" @click="cancel">Cancelar</button>
            <button class="btn btn-primary" @click="confirm">Aceptar</button>
        </template>
    </BaseModal>
</template>
<script setup>
import { ref } from "vue";


const props = defineProps({message: String});
const emit = defineEmits(["close"]);

const open = ref(false);

const confirm = () => emit('close', true);
const cancel = () => emit('close', false);
</script>

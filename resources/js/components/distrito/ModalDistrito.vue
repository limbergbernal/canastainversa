<template>
    <Modal v-model="showModal" size="md">
        <template #header>
            <h5 class="modal-title">{{ isEditar ? 'Editar Distrito' : 'Nuevo Distrito' }}</h5>
        </template>
        <form id="formDistrito" @submit.prevent="guardar">
            <div class="form-horizontal">
                <div class="form-group" :class="{'has-danger': errors.distrito}">
                    <label for="distrito" class="form-label">Distrito</label>
                    <input type="text" class="form-control" v-model="distrito.distrito" placeholder="Nombre de Distrito">
                    <div v-if="errors.distrito" class="form-control-feedback">
                        {{ errors.distrito[0] }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero" class="form-label">Numero de Distrito</label>
                    <input type="text" class="form-control" v-model="distrito.numero" placeholder="Numero de distrito">
                    <div v-if="errors.numero" class="form-control-feedback">
                        {{ errors.numero[0] }}
                    </div>
                </div>
                <div class="form-group" :class="{'has-danger': errors.estado}">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-control" v-model="distrito.estado">
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
            <button type="submit" form="formDistrito" class="btn btn-primary" :disabled="loading">{{ isEditar ? "Actualizar" : "Guardar" }}</button>
        </template>
    </Modal>
</template>
<script setup>
import Modal from "@/components/UI/Modal.vue"
import { computed, onMounted, onUnmounted, ref } from "vue";
import { useForm } from "../composables/useForm";
import axios from "axios";
import { notify } from "@/utils/alert";
import { error } from "jquery";
import { ESTADOS } from "../../constants/options";

const showModal = ref(false);
const { form: distrito, errors, reset, setData, loading, submit} = useForm({
    id: null,
    distrito: '',
    numero: '',
    estado: 'HABILITADO'
});

const isEditar = computed(() => distrito.value.id)

const openModal = async(event) => {
    const id = event.detail?.id ?? null;
    showModal.value = true;
    console.log('ID recibido en el evento:', id);
    if(id){
        await obtenerDistrito(id);
    }else{
        reset();
    }
}

const obtenerDistrito = async(id) => {
    try{
        const response = await axios.get(`/api/distrito/${id}`);
        setData(response.data);
    }catch(error){
        console.error('Error al obtener el distrito', error);
    }
};

const guardar = async() => {
    const url = isEditar.value
                ? `/api/distrito/${distrito.value.id}`
                : "/api/distrito";
    const method = isEditar.value ? "put" : "post";

    const res = await submit(url, method);
    if(res){
        showModal.value = false;
        notify.success(`Distrito ${isEditar.value.id ? 'actualizado' : 'creado'} exitosamente`);
        reset();
        window.dispatchEvent(new CustomEvent('refresh-distritos', { detail: res}));
    }
}
onMounted(() => {
    window.addEventListener('open-modal-distrito', openModal);
});

onUnmounted(() => {
    window.removeEventListener('open-modal-distrito', openModal);
});
</script>

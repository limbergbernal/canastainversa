<template>
  <div v-if="show">
    <div class="modal fade show d-block">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5>Editar Barrio</h5>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nombre</label>
              <input v-model="form.nombre" class="form-control" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-backdrop fade show"></div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      show: false,
      form: {
        id: null,
        nombre: "",
        tipo: "BARRIO",
        estado: "HABILITADO",
        distrito_id: null,
      },
    };
  },
  mounted() {
    window.addEventListener("editar-barrio", (e) => {
      this.form.id = e.detail.id;
      // axios.get(`/barrio/${this.form.id}`).then(({data}) => {
      //     this.form.nombre = data.nombre;
      //     this.form.tipo = data.tipo;
      //     this.form.estado = data.estado;
      //     this.form.distrito_id = data.distrito_id;
      //     this.show = true;
      // });
      this.show = true;
    });
  },
  beforeUnmount() {
    window.removeEventListener("editar-barrio");
  },
};
</script>

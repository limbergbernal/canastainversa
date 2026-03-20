<template>
  <div>
    <div class="row">
        <div class="col-12">
            <select name="barrio" id="barrio" class="form-control">
                <option value="">Seleccione un barrio</option>
                <option v-for="barrio in barrios" :key="barrio.id" :value="barrio.id">
                    {{ barrio.nombre}}
                </option>
            </select>
        </div>
    </div>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Ene-Feb</th>
        <th>Mar-Abr</th>
        <th>May</th>
        <th>Jun-Jul</th>
        <th>Ago</th>
        <th>Sep-Oct</th>
        <th>Nov-Dic</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
    props: {
        items: {
            type: Array,
            default: () => []
        },
        barrios: {
            type: Array,
            default: () => []
        }
    }
};
</script>

<style>
</style>

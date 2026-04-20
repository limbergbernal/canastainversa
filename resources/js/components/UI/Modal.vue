<template>
  <Teleport to="body">
    <div v-if="modelValue">
      <!-- BACKDROP -->
      <div class="modal-backdrop fade show"></div>
      <!-- MODAL-->
      <div class="modal fade show d-block" tabindex="-1" @keydown.esc="close">
          <div class="modal-dialog" :class="sizeClass">
              <div class="modal-content">
            <!-- HEADER -->
            <div class="modal-header">
              <slot name="header">
                <h5 class="modal-title">Modal</h5>
              </slot>
              <button type="button" class="btn-close" @click="close"></button>
            </div>
            <!-- BODY -->
            <div class="modal-body">
              <slot />
            </div>

            <!-- footer -->
            <div class="modal-footer">
              <slot name="footer">
                <button class="btn btn-secondary" @click="close">
                  Cancelar
                </button>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Teleport>
</template>
<script setup>
import {computed ,onMounted, onUnmounted, watch } from "vue";

const props = defineProps({
  modelValue: {
    type: Boolean,
    default: false,
  },
  size: {
    type: String,
    default: "md", //sm, md, lg, xl
  },
});
const emit = defineEmits(["update:modelValue", "close"]);

// computed para tamaño
const sizeClass = computed(() => {
  return {
    "modal-sm": props.size === "sm",
    "modal-md": props.size === "md",
    "modal-lg": props.size === "lg",
    "modal-xl": props.size === "xl",
  };
});
// cerrar modal
const close = () => {
  emit("update:modelValue", false);
  emit("close");
};
// onMounted(() => {
//   document.body.classList.add("modal-open");
// });

// onUnmounted(() => {
//   document.body.classList.remove("modal-open");
// });
watch(
  () => props.modelValue,
  (newValue) => {
    if(newValue){
      document.body.classList.add('modal-open')
    }else{
      document.body.classList.remove('modal-open')
    }
  }
)
</script>
<style scope>
    .modal-enter-active,
.modal-leave-active {
  transition: all 0.25s ease;
}

.modal-enter-from {
  opacity: 0;
  transform: scale(0.95);
}

.modal-enter-to {
  opacity: 1;
  transform: scale(1);
}

.modal-leave-from {
  opacity: 1;
  transform: scale(1);
}

.modal-leave-to {
  opacity: 0;
  transform: scale(0.95);
}
</style>

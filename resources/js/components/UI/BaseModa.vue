<template>
  <Teleport to="body">
    <transition name="fade">
      <div
        v-if="modelValue"
        class="modal fade show d-block"
        tabindex="-1"
        @click.self="close"
      >
        <di class="modal-dialog modal-dialog-centered">
          <transition name="scale">
            <div class="modal-content" ref="modalRef">
              <!-- HEADER -->
              <div class="modal-header">
                <slot name="header">
                  <h5>Modal</h5>
                </slot>
                <button type="button" class="btn-close" @click="close"></button>
              </div>
              <!-- BODY -->
              <div class="modal-body">
                <slot />
              </div>
              <!-- FOOTER -->
              <div class="modal-footer">
                <slot name="footer">
                  <button class="btn btn-secondary" @click="close">
                    Cerrar
                  </button>
                </slot>
              </div>
            </div>
          </transition>
        </di>
      </div>
    </transition>
    <div v-if="modelValue" class="modal-backdrop fade show"></div>
  </Teleport>
</template>

<script setup>
import { nextTick, onBeforeMount, onMounted, watch } from "vue";

const props = defineProps({ modelValue: Boolean });
const emit = defineEmits(["update:modelValue"]);

const modalRef = ref(null);

const focusable =
  'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
let firstEl, lastEl;

const close = () => emit("update:modelValue", false);

// bloquear scroll
watch(
  () => props.modelValue,
  (val) => {
    document.body.classList.toggle("modal-open", val);
    if (val) {
      nextTick(() => {
        const elements = modalRef.value.querySelectorAll(focusable);
        firstEl = elements[0];
        lastEl = elements[elements.length - 1];
        firstEl?.focus();
      });
    }
  }
);

// ESC + focus trap
const handleKey = (e) => {
  if (!props.modelValue) return;

  if (e.key === "Escape") close();
  if (e.key === "Tab") {
    if (e.shiftKey && document.activeElement === firstEl) {
      e.preventDefault();
      lastEl.focus();
    } else if (!e.shiftKey && document.activeElement === lastEl) {
      e.preventDefault();
      firstEl.focus();
    }
  }
};
onMounted(() => document.addEventListener("keydown", handleKey));
onBeforeMount(() => document.removeEventListener("keydown", handleKey));
</script>
<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.scale-enter-active {
  transition: all 0.2s ease;
}
.scale-enter-from {
  transform: scale(0.95);
  opacity: 0;
}
</style>

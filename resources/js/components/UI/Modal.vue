<template>
    <Teleport to="body">
        <div v-if="show">
            <!-- MODAL-->
             <div class="modal fade sho d-block" tabindex="-1">
                <div class="modal-dialog">
                    <!-- HEADER -->
                     <div class="modal-header">
                        <slot name="header"></slot>
                        <button type="button" class="btn-close"></button>
                     </div>
                     <!-- BODY -->
                      <div class="modal-body">
                        <slot></slot>
                      </div>

                      <!-- footer -->
                       <div class="modal-footer">
                        <slot name="footer"></slot>
                       </div>
                </div>
             </div>
        </div>
    </Teleport>
</template>
<script>
export default {

}
</script>

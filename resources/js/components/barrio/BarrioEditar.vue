<template>
    <div>
        comidaasfasdf
    </div>
</template>
<script>
export default {
    mounted(){
        window.addEventListener('editar-barrio', (e) => {
            console.log('Editar barrio con id:');
        })
    },
    beforeUnmount(){
        window.removeEventListener('editar-barrio');
    }
}
</script>

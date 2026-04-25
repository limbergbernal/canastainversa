import Swal from "sweetalert2";

const baseConfig = {
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    reserseButtons: true,
}

export const alert = {
    success(title = "Exito", text = " "){
        return Swal.fire({
            ...baseConfig,
            icon: "success",
            title,
            text,
        });
    },
    error(title = "Error", text = " "){
        return Swal.fire({
            ...baseConfig,
            icon: "error",
            title,
            text,
        });
    },
    warning(title = "Advertencia", text = " "){
        return Swal.fire({
            ...baseConfig,
            icon: "warning",
            title,
            text,
        });
    },
    info(title ="Info", text = " "){
        return Swal.fire({
            ...baseConfig,
            icon: "info",
            title,
            text,
        });
    },
    confirm(title = "¿Estas seguro?", text = "Esta accion no se puedes deshacer!"){
        return Swal.fire({
            ...baseConfig,
            icon: "question",
            title,
            text,
            showCancelButton: true,
            confirmButtonText: "Si, continuar",
            cancelButtonText: "Cancelar"
        });
    }
}

const toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});

export const notify = {
    success(msg){
        toast.fire({ icon: "success", title: msg})
    },
    error(msg){
        toast.fire({ icon: "error", title: msg })
    }
}

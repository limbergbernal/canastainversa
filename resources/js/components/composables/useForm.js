import axios from 'axios';
import {ref} from 'vue';

export function useForm(initialValues){
    const form = ref({...initialValues});

    // Manejo de errores
    const errors = ref({});

    // Estado de carga
    const loading = ref(false);

    const reset = () => {
        Object.assign(form.value, initialValues);
        errors.value = {};
    }
    /**
     * Setear datos
     */
    const setData = (data) => {
        Object.assign(form.value, data);
    }

    //  Enviar datos (POST, PUT, PATCH)
    const submit = async(url, method = 'post') => {
        loading.value = true;
        errors.value = {};
        try{
            let response;
            switch(method.toLowerCase()){
                case 'post':
                    response = await axios.post(url, form.value);
                    break;
                case 'put':
                    response = await axios.put(url, form.value);
                    break;
                case 'patch':
                    response = await axios.patch(url, form.value);
                    break;
                default:
                    throw new Error('Metodo HTTP no soportado');
            }
            return response.data;
        }
        catch(e){
            // validaciones laravel
            if(e.response && e.response.status === 422){
                errors.value = e.response.data.errors || {};
            }else{
                console.error("Error: ", e);
            }
            return null;
        }
        finally{
            loading.value = false;
        }
    }

    return {form,errors, loading, submit, reset, setData};
}

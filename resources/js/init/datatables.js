import { DataTableFactory } from '../core/datatable';
import { tableRegistry } from '../datatable/registry';

$(function(){
    $('.datatable').each(function(){
        const key = $(this).data('table');

        if(!tableRegistry[key]){
            console.warn('No existe configuracion para: ', key);
            console.log("tabla ignorada");
            return;
        }

        DataTableFactory(tableRegistry[key]).init(this);
        console.log("tabla inicializada: ", key);
    });
});

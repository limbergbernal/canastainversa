import { DataTableFactory } from '../core/datatable';
import { tableRegistry } from '../datatable/registry';

$(function(){
    $('.datatable').each(function(){
        const key = $(this).data('table');
        const url = $(this).data('url');

        if(!tableRegistry[key]){
            console.warn('No existe configuracion para: ', key);
            console.log("tabla ignorada");
            return;
        }

        DataTableFactory(tableRegistry[key](url)).init(this);
        console.log("tabla inicializada: ", key);
    });
});

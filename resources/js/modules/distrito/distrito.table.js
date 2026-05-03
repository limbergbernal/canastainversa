import { createDataTable } from "../../datatable/factory";

export function initDistritoTable(){
    return createDataTable({
        el: '#distrito-table',
        ajax: '{{ route("distrito.data") }}',
        columns: [
            { data: 'distrito', name: 'distrito.distrito', title: 'Distrito'},
            { data: 'numero', name: 'distrito.numero', title: 'Numero'},
            { data: 'Estado', name: 'distrito.estado', title: 'Estado'},
            {
                data: 'acciones',
                orderable: false,
                searchable: false,
                title: 'Acciones'
            }
        ]
    });
}

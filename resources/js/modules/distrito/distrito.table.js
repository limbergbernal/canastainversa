// import { createDataTable } from "../../datatable/factory";

// export function initDistritoTable(){
//     return createDataTable({
//         el: '#distrito-table',
//         ajax: '{{ route("distrito.data") }}',
//         columns: [
//             { data: 'distrito', name: 'distrito.distrito', title: 'Distrito'},
//             { data: 'numero', name: 'distrito.numero', title: 'Numero'},
//             { data: 'estado', name: 'distrito.estado', title: 'Estado'},
//             {
//                 data: 'acciones',
//                 orderable: false,
//                 searchable: false,
//                 title: 'Acciones'
//             }
//         ]
//     });
// }

export const distritoTableConfig = (url) => ({
    ajax: url,
    columns: [
        { data: "distrito", name: "distrito", title: "Distrito" },
        { data: "numero", name: "numero", title: "Numero" },
        { data: "estado", name: "estado", title: "Estado" },
        {
            data: "acciones",
            orderable: false,
            searchable: false,
            title: "Acciones",
        },
    ],
});

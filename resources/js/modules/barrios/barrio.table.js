export const barrioTableConfig = (url) => ({
    ajax: url,
    columns: [
        { data: "tipo", name: "barrios.tipo", title: "Tipo" },
        { data: "nombre", name: "barrios.nombre", title: "Nombre" },
        { data: "distrito", name: "distritos.distrito", title: "Distrito" },
        { data: "estado", name: "barrios.estado", title: "Estado" },
        {
            data: "acciones",
            orderable: false,
            searchable: false,
        },
    ],
});

export function initDataTableDefaults() {
    $.extend(true, $.fn.dataTable.defaults, {
        processing: true,
        serverSide: true,
        paging: true,
        searching: true,
        ordering: true,
        lengthMenu: [10, 25, 50, 100],
        responsive: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
}

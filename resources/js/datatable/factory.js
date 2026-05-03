export function createDataTable({el, ajax, columns, options = {}}){
    if(!el){
        console.error('Selector requerido para DataTable');
        return;
    }
    return $(el).DataTable({
        ajax: {
            url: ajax,
            type: 'GET'
        },
        columns: columns,
        ...options
    });
}

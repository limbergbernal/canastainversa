@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title"><span class="lstick"></span>Barrios</h4>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" id="btnNuevo">Nuevo</button>
                    </div>
                    <table class="datatable table" data-table="barrio" data-url="{{ route('barrio.data') }}" id="datatable-barrio">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Distrito</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div data-vue="barrio/BarrioEditar2"></div>
    </div>
@endsection
@section('script')
    @include('layouts.datatable')
    <script>
        $(document).ready(function(){
            // $('#mi-tabla').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: '{{ route('barrio.data') }}',
            //     paging: true,
            //     searching: true,
            //     lengthMenu: [10, 25, 50, 100],
            //     ordering: true,
            //     columns: [
            //         { data: 'tipo',name:'barrios.tipo', title: 'Tipo'},
            //         { data: 'nombre',name: 'barrios.nombre', title: 'Nombre' },
            //         { data: 'distrito',name: 'distritos.distrito', title: 'Distrito'},
            //         { data: 'estado',name: 'barrios.estado', title: 'Estado'},
            //         {
            //         data: 'acciones',
            //         orderable: false,
            //         searchable: false
            //         }
            //     ],
            //     language: {
            //         url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            //     }
            // });
            $(document).on('click', '.edit-btn', function(){

                window.dispatchEvent(new CustomEvent('editar-barrio', {
                    detail: {
                        id: $(this).data('id')
                    }
                }));
            });
            $(document).on('click', '#btnNuevo', function(){
                window.dispatchEvent(new CustomEvent('editar-barrio'));
            });
            $(document).on('click', '.delete-btn', function(){

            });
            window.addEventListener('barrio-guardado', function(){
                $('#mi-tabla').DataTable().ajax.reload(null, false);
            });

            //  window.addEventListener('barrio-guardado', function(event){
            //     let id = event.detail.id;
            //     $('#mi-tabla').DataTable().ajax.reload(null, false);
            // });
        })
    </script>
@endsection

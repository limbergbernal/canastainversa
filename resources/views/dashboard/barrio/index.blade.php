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
                    <table id="mi-tabla" class="table">
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
    </div>
@endsection
@section('script')
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#mi-tabla').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('barrio.data') }}',
                paging: true,
                searching: true,
                lengthMenu: [10, 25, 50, 100],
                ordering: true,
                columns: [
                    { data: 'tipo', title: 'Tipo'},
                    { data: 'nombre', title: 'Nombre' },
                    { data: 'distrito', title: 'Distrito'},
                    {
                    data: 'acciones',
                    orderable: false,
                    searchable: false
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                }
            });
        })
    </script>
@endsection

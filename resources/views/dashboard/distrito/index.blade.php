@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 col md-12">
            <div class="card">
                <div class="d-flex">
                    <div>
                        <h4 class="card-title"><span class="lstick"></span>Distritos</h4>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary" id="btnNuevo">Nuevo</button>
                </div>
                <table class="datatable table" data-table="distrito" data-url="{{ route('distrito.data') }}" id="datatable-distrito">
                    <thead>
                        <tr>
                           <th>Distrito</th>
                           <th>Numero</th>
                           <th>Estado</th>
                           <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div data-vue="distrito/ModalDistrito"></div>
    </div>
@endsection
@section('script')
@include('layouts.datatable')
<script>
        $(document).ready(function(){

            $(document).on('click', '.edit-btn', function(){
                window.dispatchEvent(new CustomEvent('open-modal-distrito', {
                    detail: {
                        id: $(this).data('id')
                    }
                }))
            });

            $(document).on('click', '#btnNuevo', function(){
                window.dispatchEvent(new CustomEvent('open-modal-distrito'));
            });

            window.addEventListener('refresh-distritos', function(){
                $('#datatable-distrito').DataTable().ajax.reload(null, false);
            })
        });
    </script>
@endsection

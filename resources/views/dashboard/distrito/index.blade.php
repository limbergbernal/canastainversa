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
                <table id="mi-tabla" class="table">
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
    </div>
@endsection
@section('script')
@include('layouts.datatable')
<script>
        import { InitDataTableDefaults} from '../assets/js/datatable/config.js';
        import { initDistritoTable } from '../assets/js/datatable/distrito.js';
        $(document).ready(function(){
            initDataTableDefaults();
            initDistritoTable();
        });
    </script>
@endsection

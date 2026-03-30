@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title"><span class="lstick"></span>Reportes por Distrito</h4>
                        </div>
                    </div>
                    <div data-vue="TablaDistrito" data-distritos='@json($distritos)'></div>
                </div>
            </div>
        </div>
    </div>
@endsection

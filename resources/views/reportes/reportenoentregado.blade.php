@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title"><span class="lstick"></span>Reportes por Barrio</h4>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Barrio</th>
                                <th>Entregas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beneficiarios as $beneficiario )
                                <tr>
                                    <td>{{ $beneficiario->nombre_completo }}</td>
                                    <td>{{ $beneficiario->ci }}</td>
                                    <td>{{ $beneficiario->barrio->nombre }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

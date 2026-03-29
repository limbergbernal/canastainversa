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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Distrito</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>   
                        </thead>
                        <tbody>
                            @foreach ($barrios as $barrio )
                            <tr>
                                <td>{{ $barrio->tipo }}</td>
                                <td>{{ $barrio->nombre }}</td>
                                <td>{{ $barrio->distrito->distrito }}</td>
                                <td>{{ $barrio->estado }}</td>
                                <td>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

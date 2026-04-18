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
                                <th>Estado</th>
                                <th>Nombre</th>
                                <th>Cedula</th>
                                <th>Entregas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beneficiarios as $beneficiario )
                                <tr>
                                    <td>{{ $beneficiario->estado }}</td>
                                    <td>{{ $beneficiario->nombre_completo }}</td>
                                    <td>{{ $beneficiario->ci }}</td>
                                    <td>
                                        @if ($beneficiario->entregas->isEmpty())
                                            No se han registrado entregas para este beneficiario.
                                        @else

                                                @foreach ($beneficiario->entregas as $entrega)
                                                    {{$entrega->entrega}} - {{ $entrega->barrio->nombre }} - {{ $entrega->estado }}<br>
                                                @endforeach

                                        @endif

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

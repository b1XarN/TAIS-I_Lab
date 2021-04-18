@extends('plantilla')

@section('contenido')
    @php
    session_start();
    @endphp
    <style>
        table tr:hover {
            background-color: whitesmoke;
            cursor: pointer;
        }

    </style>
    <div class="container">
        <h2 class="text-center fs-3 fw-bolder">LISTA DE EMPRESAS</h2>
        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt3" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="span">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col" class="text-center" style="width: 10px;">N°</th>
                    <th scope="col">RUC</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $int = 1;
                @endphp
                @foreach ($empresa as $itemempresa)
                    <tr>
                        <th class="align-middle" scope="row">{{ $int }}</th>
                        <td class="align-middle">{{ $itemempresa->emp_ruc }}</td>
                        <td class="align-middle"><a href="" class="link-dark">{{ $itemempresa->emp_nombre }}</a></td>
                        <td class="align-middle">{{ $itemempresa->emp_direccion }}</td>
                        <td class="align-middle">
                            <a href="{{route('empresa.edit',$itemempresa->emp_ruc)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"> </i>Editar</a>
                            <a href="{{route('empresa.show',$itemempresa->emp_ruc)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                        </td>
                    </tr>
                    @php
                        $int = $int + 1;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

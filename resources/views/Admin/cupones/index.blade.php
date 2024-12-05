@extends('layouts.admin')

@section('content')
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Cupones</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li>
                <a href="{{ route('dashboard') }}">
                    <div class="text-tiny">Panel de Control</div>
                </a>
            </li>
            <li>
                <i class="icon-chevron-right"></i>
            </li>
            <li>
                <div class="text-tiny">Cupones</div>
            </li>
        </ul>
    </div>

    <div class="wg-box">
        <div class="flex items-center justify-between gap10 flex-wrap">
            <div class="wg-filter flex-grow">
                <form class="form-search">
                    <fieldset class="name">
                        <input type="text" placeholder="Buscar aquí..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                    </fieldset>
                    <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
            <a class="tf-button style-1 w208" href="{{ route('cupones.create') }}"><i class="icon-plus"></i>Agregar nuevo</a>
        </div>

        <div class="wg-table table-all-user">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Descuento</th>
                            <th>Fecha de Expiración</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cupones as $cupon)
                            <tr>
                                <td>{{ $cupon->id }}</td>
                                <td>{{ $cupon->codigo_cupon }}</td>
                                <td>{{ $cupon->descripcion }}</td>
                                <td>{{ $cupon->descuento }}%</td>
                                <td>{{ $cupon->fecha_expiracion }}</td>
                                <td>
                                    <span class="badge {{ $cupon->estado ? 'bg-success' : 'bg-danger' }}">
                                        {{ $cupon->estado ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('cupones.edit', $cupon->id) }}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('cupones.destroy', $cupon->id) }}" method="POST"
                                            onsubmit="return confirm('¿Seguro que deseas eliminar este cupon?');">
                                            @csrf
                                            @method('DELETE') <!-- Método DELETE -->
                                            <button class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="divider"></div>

        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
            <!-- Paginación -->
            {{ $cupones->links() }}
        </div>
    </div>
@endsection

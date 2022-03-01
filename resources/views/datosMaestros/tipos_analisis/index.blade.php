@extends('layouts.app', ['page' => __('Tipo de analisis'), 'pageSlug' => 'tipos-analisis', 'section' => 'dlaboratorio'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Tipo de analisis') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{ route('tipos-analisis.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar tipo de analisis') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Id') }}</th>
                                <th scope="col">{{ __('Nombre') }}</th>
                                <th scope="col">{{ __('Fecha de creación') }}</th>
                                <th scope="col">{{ __('Ultima modificación') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                    @foreach ($tiposAnalisis as $tipoAnalisis)
                                        <tr>
                                            <td>{{ $tipoAnalisis->id }}</td>
                                            <td>{{ $tipoAnalisis->nombre }}</td>
                                            <td>{{ $tipoAnalisis->created_at->format('h:m d/m/Y') }}</td>
                                            <td>{{ $tipoAnalisis->updated_at != ''? $tipoAnalisis->updated_at->format('h:m d/m/Y'):'-' }}</td>
                                            <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="tim-icons icon-settings-gear-63"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            {{-- @if (auth()->tipoAnalisis()->id != $tipoAnalisis->id) --}}
                                                                <form action="{{ route('tipos-analisis.destroy', $tipoAnalisis) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
    
                                                                    <a class="dropdown-item" href="{{ route('tipos-analisis.edit', $tipoAnalisis) }}">{{ __('Editar') }}</a>
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __('Esta seguro desea eliminar?') }}') ? this.parentElement.submit() : ''">
                                                                                {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            {{-- @else --}}
                                                                {{-- <a class="dropdown-item" href="{{ route('profile.edit', $tipoAnalisis->id) }}">{{ __('Editar') }}</a> --}}
                                                            {{-- @endif --}}
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

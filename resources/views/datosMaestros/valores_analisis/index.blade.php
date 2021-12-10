@extends('layouts.app', ['page' => __('Valores de los analisis'), 'pageSlug' => 'valores-analisis', 'section' => 'laboratorio'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Valores de los analisis') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{ route('valores-analisis.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar campo  valor de analisis') }}</a>
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
                                    @foreach ($valoresAnalisis as $valorAnalisis)
                                        <tr>
                                            <td>{{ $valorAnalisis->id }}</td>
                                            <td>{{ $valorAnalisis->nombre }}</td>
                                            <td>{{ $valorAnalisis->created_at->format('h:m d/m/Y') }}</td>
                                            <td>{{ $valorAnalisis->updated_at != ''? $valorAnalisis->updated_at->format('h:m d/m/Y'):'-' }}</td>
                                            <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="tim-icons icon-settings-gear-63"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            {{-- @if (auth()->valorAnalisis()->id != $valorAnalisis->id) --}}
                                                                <form action="{{ route('valores-analisis.destroy', $valorAnalisis) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
    
                                                                    <a class="dropdown-item" href="{{ route('valores-analisis.edit', $valorAnalisis) }}">{{ __('Editar') }}</a>
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __('Esta seguro desea eliminar?') }}') ? this.parentElement.submit() : ''">
                                                                                {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            {{-- @else --}}
                                                                {{-- <a class="dropdown-item" href="{{ route('profile.edit', $valorAnalisis->id) }}">{{ __('Editar') }}</a> --}}
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

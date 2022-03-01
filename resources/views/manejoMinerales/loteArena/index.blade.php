@extends('layouts.app', ['page' => __('Lotes de Arenas'), 'pageSlug' => 'mm-control-arenas', 'section' => 'manejo-minerales'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Control Arenas') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{ route('mm-control-arenas.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar Lote de arena') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Id') }}</th>
                                <th scope="col" style="max-width:140px">{{ __('Codigo') }}</th>
                                <th scope="col">{{ __('Molino') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Ton. Humedas') }}</th>
                                <th scope="col">{{ __('Ton. Secas') }}</th>
                                <th scope="col">{{ __('Resp. Lote Arena') }}</th>
                                <th scope="col">{{ __('Muestreador') }}</th>
                                <th scope="col">{{ __('Fecha Creación') }}</th>
                                {{-- <th scope="col">{{ __('Fecha Act') }}</th> --}}
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                    @foreach ($lotesArenas as $lote)
                                        <tr>
                                            <td>{{ $lote->id }}</td>
                                            <td>{{ $lote->codigo }}</td>
                                            <td>{{ $lote->molino->nombre }}</td>
                                            <td>{{ $lote->status_->nombre }}</td>
                                            <td>{{ $lote->toneladas_humedad }}</td>
                                            <td>{{ $lote->toneladas_seca }}</td>
                                            <td>{{ $lote->responsable }}</td>
                                            <td>{{ $lote->user->name }}</td>
                                            <td>{{ $lote->created_at->format('d/m/Y') }}</td>
                                            {{-- <td>{{ $lote->updated_at != ''? $lote->updated_at->format('h:m d/m/Y'):'-' }}</td> --}}
                                            <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="tim-icons icon-settings-gear-63"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            {{-- @if (auth()->seccion()->id != $lote->id) --}}
                                                                <form action="{{ route('mm-control-arenas.destroy', $lote) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
    
                                                                    <a class="dropdown-item" href="{{ route('mm-control-arenas.edit', $lote) }}">{{ __('Editar') }}</a>
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __('Esta seguro desea eliminar?') }}') ? this.parentElement.submit() : ''">
                                                                                {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            {{-- @else --}}
                                                                {{-- <a class="dropdown-item" href="{{ route('profile.edit', $lote->id) }}">{{ __('Editar') }}</a> --}}
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

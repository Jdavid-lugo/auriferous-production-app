@extends('layouts.app', ['page' => __('Analisis para Operaciones'), 'pageSlug' => 'reactivos-analisis', 'section' => 'laboratorio'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Analisis para Operaciones') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{ route('analisis-operaciones.create') }}" class="btn btn-sm btn-primary">{{ __('Asociar reactivos con los analisis') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    @include('alerts.error')
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Tipo Analisis') }}</th>
                                <th scope="col">{{ __('Valores') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @php
                                    $countTr=0;
                                    $countTrLast=0;
                                @endphp
                                {{-- @foreach ($Reactivos as $key=>$analisis)
                                    <tr>
                                        <td>{{ $analisis->nombre }}</td>
                                        <td>
                                            @php
                                                $array_valores = explode('|', $analisis->reactivos );   
                                            @endphp
                                                @foreach ($array_valores as $valor)
                                                    <span class="badge badge-pill badge-info " style="font-size:10pt">{{ $valor }}</span>
                                                @endforeach
                                        </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="tim-icons icon-settings-gear-63"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="#" method="post">
                                                            @csrf
                                                            <a class="dropdown-item" href="{{ route('reactivos-analisis.create') }}">{{ __('Editar') }}</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach --}}
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

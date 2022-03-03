@extends('layouts.app', ['page' => __('Analisis de manejo de minerales'), 'pageSlug' => 'analisis-manejo-minerales', 'section' => 'laboratorio'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Analisis para manejo de minerales') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                        <a href="{{ route('analisis-manejo-minerales.create') }}" class="btn btn-sm btn-primary">{{ __('Registrar nuevo analisis') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    @include('alerts.error')
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('#') }}</th>
                                <th scope="col">{{ __('Codigo Lote Arena') }}</th>
                                <th scope="col">{{ __('Tipo de Analisis') }}</th>
                                <th scope="col">{{ __('Fecha Solicitud') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @php
                                    $countTr=0;
                                    $countTrLast=0;
                                @endphp
                                @foreach ($analisis as $key=>$analisis_)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $analisis_->codigo }}</td>
                                        <td>{{ $analisis_->nombre }}</td>
                                        <td>{{ $analisis_->fecha }}</td>
                                            <td class="text-right">
                                                <div class="">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="{{ route('analisis-manejo-minerales.stats.edit',['tipo_analisis_id'=>$analisis_->tipo_analisis_id,'lote_arena_id'=>$analisis_->lote_arena_id]) }}" role="button">
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </a>
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

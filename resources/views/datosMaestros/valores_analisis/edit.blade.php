@extends('layouts.app', ['page' => __('Valores para los analisis'), 'pageSlug' => 'valores-secciones', 'section' => 'dlaboratorio'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Valores para los analisis') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('valores-analisis.index') }}" class="btn btn-sm btn-primary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form method="post" action="{{ route('valores-analisis.update', $valorAnalisis) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Información de los valores para los analisis') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-seccion-nombre">{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre" id="input-seccion-nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombres') }}" value="{{ old('nombre', $valorAnalisis->nombre) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'nombre'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

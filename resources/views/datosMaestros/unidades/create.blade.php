@extends('layouts.app', ['page' => __('Administración de unidades'), 'pageSlug' => 'unidades', 'section' => 'manejoMinerales'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Administración de unidades') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('unidades.index') }}" class="btn btn-sm btn-primary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('unidades.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Información de la unidad') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nombre">{{ __('Nombres') }}</label>
                                    <input type="text" name="nombre" id="input-nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombres') }}" value="{{ old('nombre') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'nombre'])
                                </div>
                                <div class="form-group{{ $errors->has('siglas') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-siglas">{{ __('siglas') }}</label>
                                    <input type="text" name="siglas" id="input-siglas" class="form-control form-control-alternative{{ $errors->has('siglas') ? ' is-invalid' : '' }}" placeholder="{{ __('siglas') }}" value="{{ old('siglas') }}" required>
                                    @include('alerts.feedback', ['field' => 'siglas'])
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

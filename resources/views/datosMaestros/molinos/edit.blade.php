@extends('layouts.app', ['page' => __('Administración de molinos'), 'pageSlug' => 'molinos', 'section' => 'manejoMinerales'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Administración de molinos') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('molinos.index') }}" class="btn btn-sm btn-primary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form method="post" action="{{ route('molinos.update', $molino) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Información del molino') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-molino-nombre">{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre" id="input-molino-nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombres') }}" value="{{ old('nombre', $molino->nombre) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'nombre'])
                                </div>
                                <div class="form-group{{ $errors->has('rif') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-rif">{{ __('Rif') }}</label>
                                    <input type="text" name="rif" id="input-rif" class="form-control form-control-alternative{{ $errors->has('rif') ? ' is-invalid' : '' }}" placeholder="{{ __('rif') }}" value="{{ old('rif', $molino->rif) }}" required>
                                    @include('alerts.feedback', ['field' => 'rif'])
                                </div>
                                <div class="form-group{{ $errors->has('tlf') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tlf">{{ __('Telefono') }}</label>
                                    <input type="text" name="tlf" id="input-tlf" class="form-control form-control-alternative{{ $errors->has('tlf') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefono') }}" value="{{ old('rif', $molino->tlf) }}">
                                    @include('alerts.feedback', ['field' => 'tlf'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-Sector">{{ __('Dirección') }}</label>
                                    <input type="text" name="sector" id="input-Sector" class="form-control form-control-alternative" placeholder="{{ __('Dirección') }}" value="{{ old('rif', $molino->sector) }}">
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

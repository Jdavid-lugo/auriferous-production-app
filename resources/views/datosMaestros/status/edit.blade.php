@extends('layouts.app', ['page' => __('Administración de status'), 'pageSlug' => 'status', 'section' => 'datosMaestros'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Administración de status') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('status.index') }}" class="btn btn-sm btn-primary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form method="post" action="{{ route('status.update', $status) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Información de la seccion') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('seccion') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="seccion">{{ __('Seccíon') }}</label>
                                    <select name="seccion" id="seccion" >
                                        <option data-placeholder="true"> Seleccione una sección</option>
                                        @foreach($seccion as $id=>$seccion_)
                                    <option {{$status->id_seccion == $id ? 'selected':'' }} value="{{ $id }}">{{ $seccion_ }}</option>
                                        @endforeach
                                    </select>                                        
                                    @include('alerts.feedback', ['field' => 'seccion'])
                                </div>                                      
                                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tipo-analisis-nombre">{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre" id="input-tipo-analisis-nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombres') }}" value="{{ old('nombre', $status->nombre) }}" required autofocus>
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
@section('scripts')
    <script type="text/javascript">
        
        $(document).ready(function() {
            var select_seccion= new SlimSelect({
                select: '[name=seccion]',
                'placeholder': true,
                
            });
        });

    </script>
@endsection
@extends('layouts.app', ['page' => __('Ingresar Lote de Arena'), 'pageSlug' => 'mm-control-arenas', 'section' => 'manejoMinerales'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Ingresar Lote de Arena') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('mm-control-arenas.index') }}" class="btn btn-sm btn-primary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('mm-control-arenas.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Información del Lote de Arena') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('molino') ? ' has-danger' : '' }}  row mb-3">
                                    <span class='col-sm-3 pl-lg-3 {{ $errors->has('codigo') ? ' has-danger' : '' }} '>
                                        <label class="form-control-label" for="input-codigo">{{ __('Codigo') }}</label>
                                        <span style="display:block;border:1px solid;border-radius:0.4285rem;color:rgba(29, 37, 59, 0.5);">
                                            <input type="text" name="codigo" id="input-codigo" class="form-control form-control-alternative{{ $errors->has('codigo') ? ' is-invalid' : '' }}" placeholder="{{ __('codigos') }}" value="{{ old('codigo') == '' ? '': old('codigo')  }} " required autofocus style='max-width:80%;min-width:80%;display:inline;border:0px;padding:0px;font-size:11pt;text-align:right;height:calc(2.0rem + 1px)' onchange="return this.value=this.value.toUpperCase()"><span style="color:#222a42;font-size:10pt;">{{old('codigo') ==''? '-'.$nroLote:'' }}</span>
                                            @include('alerts.feedback', ['field' => 'codigo'])
                                        </span>
                                    </span>
                                    <span class='col-sm-6 pl-lg-3' >
                                        <label class="form-control-label" for="molino">{{ __('Seleccione Molino') }}</label>
                                        <select id="molino" name='molino'>
                                            <option data-placeholder="true">Seleccione</option>
                                            @foreach ($molinos as $id=>$molino)
                                                <option value='{{$id}}' {{old('molino')== $id?'selected':'' }}> {{$molino}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                    <span class='col-sm-3 pl-lg-3' >
                                        <label class="form-control-label" for="status">{{ __('Seleccione status') }}</label>
                                        <select id="status" name='status'>
                                            <option data-placeholder="true">Seleccione</option>
                                            @foreach ($status as $id=>$status_)
                                                <option value='{{$status_->id}}'> {{$status_->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                                <div class="form-group{{ $errors->has('molinos') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="muestreador">{{ __('Seleccione muestreador') }}</label>
                                    <select id="muestreador" name='muestreador'>
                                        <option data-placeholder="true">Seleccione</option>
                                        @foreach ($muestreadores as $id=>$muestreador)
                                            <option value='{{$muestreador->user->id}}'> {{$muestreador->user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('responsable') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-responsable">{{ __('Responsable') }}</label>
                                    <input type="text" name="responsable" id="input-responsable" class="form-control form-control-alternative{{ $errors->has('responsable') ? ' is-invalid' : '' }}" placeholder="{{ __('responsables') }}" value="{{ old('responsable') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'responsable'])
                                </div>

                                <div class="form-group{{ $errors->has('tipo-analisis') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="tipo-analisis">{{ __('Tipo de analisis') }}</label>
                                    <select name="tipo-analisis[]" id="tipo-analisis" multiple>
                                        <option data-placeholder="true"> Seleccione tipo de análisis</option>
                                        @foreach($tiposAnalisis as $id=>$tipoAnalisis)
                                            <option value="{{ $id }}">{{ $tipoAnalisis }}</option>
                                        @endforeach
                                    </select>                                        
                                    @include('alerts.feedback', ['field' => 'tipo-analisis'])
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
            var select_molinos= new SlimSelect({
                select: '[name=molino]',
                'placeholder': true,
            });

            var select_status= new SlimSelect({
                select: '[name=status]',
                'placeholder': true,
            });
            
            var select_muestreador= new SlimSelect({
                select: '[name=muestreador]',
                'placeholder': true,
            });

            var select_tipo_analisis= new SlimSelect({
                select: '#tipo-analisis',
                placeholder: 'Seleccione el tipo de analisis',
                closeOnSelect: false,
            });
        });

    </script>
@endsection
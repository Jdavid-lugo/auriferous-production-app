@extends('layouts.app', ['page' => __('Carga de analisis para manejo de minerales'), 'pageSlug' => 'analisis-manejo-minerales', 'section' => 'laboratorio'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Cargar analisis para manejo de minerales') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('analisis-manejo-minerales.index') }}" class="btn btn-sm btn-primary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                        <div class="row align-items-center">
                        
                        </div>
                        
                    </div>
                    <div class="card-body">
                        
                        @if($errors->any())
                            
                            <div style="position:relative;min-width:80%" class="form-group" id="errores">
                                <div class="alert alert-danger">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                      <i class="tim-icons icon-simple-remove"></i>
                                    </button>
                                    @foreach($errors->all() as $key=> $error)
                                        <span>{{$error}}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <form method="post" action="{{ route('analisis-manejo-minerales.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Ingresar valores') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" style="font-size:11pt" >{{ __('Tipo de analisis:') }}</label>
                                    <h4 class="mb-0">{{$valores[0]->nombre}}</h4>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div id = "formValores" class="form-group row mb-3">
                                    @foreach ($valores as $valor)
                                        <span class='col-md-3 pl-lg-2'>
                                            <label class='form-control-label' for='{{$valor->analisis_laboratorio_id}}'>{{$valor->valores}}</label>
                                            <input type='text' name='valor_{{$valor->analisis_laboratorio_id}}' id='{{$valor->analisis_laboratorio_id}}' class='form-control form-control-alternative' placeholder='{{$valor->valores}}' value='{{ old('valor_'.$valor->analisis_laboratorio_id) }}' required autofocus>
                                            @include('alerts.feedback', ['field' => '{{$valor->analisis_laboratorio_id}}'])
                                        </span>
                                    @endforeach
                                    @include('alerts.feedback', ['field' => 'formValores'])
                                </div>
                            </div>
                            
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" style="font-size:11pt" >{{ __('Ingresar Reactivos:') }}</label>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div id = "formReactivos" class="form-group row mb-3">
                                    @foreach ($reactivos as $reactivo)
                                        
                                        <span class='col-md-3 pl-lg-2' {{ $errors->has('codigo') ? ' has-danger' : '' }} '>
                                            <label class='form-control-label' for='{{$reactivo->products->id}}'>{{$reactivo->products->name}}</label>
                                            <span style="display:block;border:1px solid;border-radius:0.4285rem;color:rgba(29, 37, 59, 0.5);">
                                                <input type='text' name='reactivo_{{$reactivo->products->id}}' id='{{$reactivo->products->id}}' 
                                                    class='form-control form-control-alternative' placeholder='{{$reactivo->reactivos}}' 
                                                    value='{{ old('reactivo_'.$reactivo->products->id) }}' required autofocus 
                                                    style='max-width:70%;min-width:70%;display:inline;border:0px;padding:0px;font-size:11pt;text-align:right;height:calc(2.0rem + 1px)' />
                                                
                                                <span style="color:#222a42;">
                                                    <select class='form-control form-control-alternative' 
                                                        name ='unidades_{{$reactivo->products->id}}' 
                                                        style='max-width:28%;min-width:28%;display:inline;border:0;padding:0px;margin:0px;'>
                                                        @foreach ($unidades as $key=>$unidad)
                                                            <option value='{{$key}}'>{{$unidad}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </span>
                                        </span>
                                    
                                    @endforeach
                                    @include('alerts.feedback', ['field' => 'formReactivos'])
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
            
            
        });

    </script>
@endsection
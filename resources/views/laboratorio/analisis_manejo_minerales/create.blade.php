@extends('layouts.app', ['page' => __('Nuevo analisis para manejo de minerales'), 'pageSlug' => 'analisis-manejo-minerales', 'section' => 'laboratorio'])

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
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('analisis-manejo-minerales.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Ingresar valores') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('tipo-analisis') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="tipo-analisis">{{ __('Tipo de analisis') }}</label>
                                    <select name="tipo-analisis" id="tipo-analisis" >
                                        <option data-placeholder="true"> Seleccione un tipo de análisis</option>
                                        @foreach($tipos_analisis as $id=>$tipoAnalisis)
                                            <option value="{{ $id }}">{{ $tipoAnalisis }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'tipo-analisis'])
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div id = "formValores" class="form-group{{ $errors->has('formValores') ? ' has-danger' : '' }} row mb-3">
                                    
                                    @include('alerts.feedback', ['field' => 'formValores'])
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

            var select_tipo_analisis= new SlimSelect({
                select: '[name=tipo-analisis]',
                'placeholder': true,
                onChange: (info) => {
                    var valores_id= [];
                    var objeto = {};
                    var tipoAnalisisId = info.value;
                    if(tipoAnalisisId) {
                        $.ajax({
                            url: 'forms/'+tipoAnalisisId,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                $('#formValores').empty();
                                $.each(data, function(key, value) {
                                    var selected_ = value.selected;
                                    var txtHtml = "";
                                    txtHtml = "<span class='col-md-3 pl-lg-2'><label class='form-control-label' for='"+value.id+"'>"+value.valores_analisis.nombre+"</label>";
                                    txtHtml += "<input type='text' name='"+value.id+"' id='"+value.id+"' class='form-control form-control-alternative {{ $errors->has("+value.id+") ? 'is-invalid' : '' }}' placeholder='"+value.valores_analisis.nombre+"' value='{{ old("+value.id+") }}' required autofocus></span>";
                                    $('#formValores').append(txtHtml);
                                    valores_id[key] =  value.id;
                                });
                            }
                        });
                    }else{
                        //$('select[name="formValores"]').empty();
                    }

                    return false; // this will stop propagation
                },
            

            });
        });

    </script>
@endsection
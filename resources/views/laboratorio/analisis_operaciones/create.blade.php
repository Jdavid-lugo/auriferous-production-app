@extends('layouts.app', ['page' => __('Analisis para Operaciones'), 'pageSlug' => 'analisis-operaciones', 'section' => 'laboratorio'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Analisis para Operaciones') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('analisis-operaciones.index') }}" class="btn btn-sm btn-primary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('analisis-operaciones.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Información del Tipo de analisis') }}</h6>
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
                                <div class="form-group{{ $errors->has('reactivos_analisis') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="reactivos_analisis">{{ __('Reactivos') }}</label>
                                    <select style="visibility:hidden" name="reactivos_analisis[]" id="reactivos_analisis" multiple>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'reactivos_analisis'])
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
                            url: 'select_ajax/'+tipoAnalisisId,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                $('#reactivos_analisis').empty();
                                $.each(data, function(key, value) {
                                    var selected_ = value.selected;
                                    $('#reactivos_analisis').append('<option '+selected_+' value="'+ value.id +'">'+ value.name +'</option>');
                                    valores_id[key] =  value.id;
                                });
                            }
                        });
                        $("#reactivos_analisis").css('visibility','visible');
                        var select_reactivos_analisis = new SlimSelect({
                            select: '#reactivos_analisis',
                            placeholder: 'Seleccione los reactivos para el analisis',
                            closeOnSelect: false,
                        }); 
                    }else{
                        $('select[name="reactivos_analisis"]').empty();
                    }

                    return false; // this will stop propagation
                },
            

            });
        });

    </script>
@endsection
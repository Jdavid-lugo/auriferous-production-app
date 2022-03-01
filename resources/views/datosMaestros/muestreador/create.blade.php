@extends('layouts.app', ['page' => __('Administración de muestreadores'), 'pageSlug' => 'muestreador', 'section' => 'manejoMinerales'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Administración de los muestreadores') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('muestreador.index') }}" class="btn btn-sm btn-primary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('muestreador.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Información del muestreador') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('muestreador') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="muestreador">{{ __('Muestreador') }}</label>
                                    <select name="muestreador" id="muestreador" >
                                        <option data-placeholder="true"> Muestreador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;Rol</option>
                                        @foreach($usuarios as $id=>$usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;  {{(count($usuario->roles)>0  ? $usuario->roles[0]->name : 'Sin Rol Asignado') }} </option>
                                        @endforeach
                                    </select>                                        
                                    
                                    <span class="form-control form-control-alternative{{ $errors->has('muestreador') ? ' is-invalid' : '' }}" style='visibility:hidden'> </span>
                                    @include('alerts.feedback', ['field' => 'muestreador'])
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
            var select_muestreador= new SlimSelect({
                select: '[name=muestreador]',
                'placeholder': true,
            });
        });

    </script>
@endsection
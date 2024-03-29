@extends('layouts.app', ['class' => 'register-page', 'page' => 'Goldtex de Venezuela', 'contentClass' => 'register-page', 'section' => 'auth'])

@if ($userCount>0)
  <script>window.location = "/login";</script>
@else
    <!-- @ hasrole("admin") -->
    @section('content')
        <div class="row">
            <div class="col-md-7 ml-auto mr-auto">
                <div class="card card-register card-white">
                    <div class="card-header">
                        <!-- <img class="card-img" src="{{ asset('assets') }}/img/card-primary.png" alt="Card image"> -->
                        <h4 class="card-title">Registrar Admin </h4>
                    </div>
                    <form class="form" method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="card-body">
                            <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-single-02"></i>
                                    </div>
                                </div>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-email-85"></i>
                                    </div>
                                </div>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-lock-circle"></i>
                                    </div>
                                </div>
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-lock-circle"></i>
                                    </div>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-lock-circle"></i>
                                    </div>
                                </div>
                                {{-- <label class="form-control-label" for="input-role">{{ __('perfil') }}</label> --}}
                                <select  name="input-role" id="input-role" class="form-control form-control-alternative" placeholder="{{ __('Perfil') }}" >
                                    <option>Seleccionar Rol</option>
                                    <option>Admin</option>
                                    <option>Laboratorio</option>
                                </select>
                            </div>
                            <div class="form-check text-left {{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="form-check-label">
                                    <input class="form-check-input {{ $errors->has('agree_terms_and_conditions') ? ' is-invalid' : '' }}" name="agree_terms_and_conditions"  type="checkbox"  {{ old('agree_terms_and_conditions') ? 'checked' : '' }}>
                                    <span class="form-check-sign"></span>
                                    Confirmas la información ingresada?
                                    @include('alerts.feedback', ['field' => 'agree_terms_and_conditions'])
                                </label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-round btn-lg">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    <!-- @ endhasrole -->
@endif

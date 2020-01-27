@extends('layout')

@section('content')

    <div class="container-register">
        <div class="row justify-content-center justify-content-center-register">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="card-header-register">{{ __('Register') }}</div>

                    <div class="card-body" id="card-body-register">
                        <form method="POST" action="{{ route('registerUsuario') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nombreusu"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="nombreusu" type="text"
                                           class="form-control @error('nombreusu') is-invalid @enderror"
                                           name="nombreusu" value="{{ old('nombreusu') }}" required
                                           autocomplete="nombreusu" autofocus>

                                    @error('nombreusu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>

                                <div class="col-md-6">
                                    <select name="tipo" class="form-control" id="tipo">
                                        <option value="0">-</option>
                                        <option value="1">Gerente</option>
                                        <option value="2">Coordinador</option>
                                        <option value="3">Operador</option>
                                        <option value="4">Técnico</option>
                                    </select>

                                    @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="camposTecnico">
                            <div class="form-group row">
                                    <label for="nombretecnico" class="col-md-4 col-form-label text-md-right">Nombre </label>
                                 <div class="col-md-6">
                                     <input id="nombretecnico" type="text" name="nombretecnico" class="form-control">
                                 </div>
                            </div>
                            <div  class="form-group row">
                                <label for="apellidotecnico" class="col-md-4 col-form-label text-md-right">Apellido </label>
                                <div class="col-md-6">
                                    <input id="apellidotecnico" type="text" name="apellidotecnico" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row">
                                <label for="telefonotecnico" class="col-md-4 col-form-label text-md-right">Telefono </label>
                                <div class="col-md-6">
                                    <input id="telefonotecnico" type="text" name="telefonotecnico" class="form-control">
                                </div>
                            </div>
                            </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $("#tipo").on('change', function () {
            var option = this.value;

            // alert(option);

            var campostecnico = $("#camposTecnico");

            switch(option) {
                case "0":
                    $("#card-header-register").css("background-color","rgba(0,0,0,.03)");
                    $("#card-body-register").css("background-color","white");
                    $("#card-body-register").css("border","1px solid rgba(0,0,0,.125)");

                    campostecnico.css("display", "none");

                    break;
                case "1":
                    $("#card-header-register").css("background-color","rgba(249, 44, 44, 0.22)");
                    $("#card-body-register").css("background-color","rgba(249, 44, 44, 0.02)");
                    $("#card-body-register").css("border","1px solid rgba(249, 44, 44, 0.22)");

                    campostecnico.css("display", "none");
                    break;
                case "2":
                    $("#card-header-register").css("background-color"," rgba(61, 164, 250, 0.22)");
                    $("#card-body-register").css("background-color"," rgba(61, 164, 250, 0.02)");
                    $("#card-body-register").css("border","1px solid rgba(61, 164, 250, 0.22)");

                    campostecnico.css("display", "none");
                    break;
                case "3":
                    $("#card-header-register").css("background-color","rgba(216, 156, 250, 0.22)");
                    $("#card-body-register").css("background-color","rgba(216, 156, 250, 0.02)");
                    $("#card-body-register").css("border","1px solid rgba(216, 156, 250, 0.22)");

                    campostecnico.css("display", "none");
                    break;
                case "4":
                    campostecnico.css("display", "flex");
                    $("#card-header-register").css("background-color","rgba(135, 220, 44, 0.22)");
                    $("#card-body-register").css("background-color","rgba(135, 220, 44, 0.02)");
                    $("#card-body-register").css("border","1px solid  rgba(135, 220, 44, 0.22)");
                    break;

            }
        })


    </script>
@endsection

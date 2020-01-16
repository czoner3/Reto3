@extends("layout")
@section("login")

    <!-- Default form login -->

        <div class="img">
            <div class="color-cortina">
            </div>
           <img class="imagen" src="{{asset('img/fondo.png')}}">
        </div>


    <form class="form text-center border border-light p-5" action="verificar">

        <p class="h4 mb-4">Sign in</p>

        <!-- Email -->
        <input type="text" id="usuario" class="form-control mb-4" placeholder="Nombre de usuario">

        <!-- Password -->
        <input type="password" id="contrasena" class="form-control mb-4" placeholder="Contraseña">

        <div class="d-flex justify-content-around">
            <div>
                <!-- Remember me -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                </div>
            </div>
            <div>
                <!-- Forgot password -->
                <a href="">Forgot password?</a>
            </div>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

        <!-- Register -->
        <p>Not a member?
            <a href="">Register</a>
        </p>

        <!-- Social login -->
        <p>or sign in with:</p>

        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

    </form>
    <!-- Default form login -->

    <div class="titulo">
    </div>

@endsection

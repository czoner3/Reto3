@extends('layouts.app')

@section('content')
    <?php
    session_start();
    $user=\App\Users::find(Auth::id());
    $_SESSION['nombreusu']= $user->nombreusu;
    $_SESSION['idusu']= $user->id;
    $_SESSION['estado']= $user->tipo;
    ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                        <?php
                        echo $_SESSION['nombreusu'];
                        echo $_SESSION['idusu'];
                        echo $_SESSION['estado'];
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

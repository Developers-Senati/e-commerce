@extends('layout/navbar')

@section("TituloPagina", "Perfil")

@section('contenido')

<div>
    @include('layout.sidebar')
</div>

<div class="container mt-5">
    <div class="row">
        <h2>Perfil</h2>
    </div>


    <div class="row profile-card">
        <?php
            $usuario = session('usuario'); 
        ?>
        <div class="col-4">
            <div class="profile-info">
                <img src="https://via.placeholder.com/150" alt="Profile Image" class="profile-image">
                <h2>{{ $usuario['username'] }}</h2>
                <p>{{ $usuario['tipo_usuario'] }}</p>
                <div class="stats">
                    <div>
                        <i class="fas fa-users"></i>254
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="form-info">
                <div class="row form-group">
                    <div class="col-12">
                        <label>Nombres</label>
                        <input type="text" value="{{ $usuario['nombres'] }}" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Apellido Paterno</label>
                        <input type="text" value="{{ $usuario['apellido_paterno'] }}" disabled>
                    </div>
                    <div class="col-6">
                        <label>Apellido Materno</label>
                        <input type="text" value="{{ $usuario['apellido_materno'] }}" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label>Dirección</label>
                        <input type="text" value="{{ $usuario['direccion'] }}" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label>Teléfeno</label>
                        <input type="text" value="{{ $usuario['telefono'] }}" disabled>
                    </div>
                </div>
                <div class="row form-group d-flex">
                    <div class="col-6">
                        <label>Password</label>
                        <input type="password" value="{{ $usuario['password'] }}" disabled>
                    </div>
                    <div class="col-6">
                        <label>Estado</label>
                        <input type="text" value="{{ $usuario['estado'] }}" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <label>Message</label>
                        <textarea></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
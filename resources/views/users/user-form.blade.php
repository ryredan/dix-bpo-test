@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Novo Usuário</h4>
                    @if($user->exists)
                    <form action="{{ route('user.update', $user) }}" method="post">
                        @method('PUT')
                    @else
                    <form action="{{ route('user.store') }}" method="post">
                    @endif
                        @csrf
                        <div class="form-group">
                            <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-single-02"></i>
                                    </div>
                                </div>
                                <input type="text" id="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ old('name', $user->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-email-85"></i>
                                    </div>
                                </div>
                                <input type="text" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email', $user->email) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-lock-circle"></i>
                                    </div>
                                </div>
                                <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Senha">
                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-lock-circle"></i>
                                    </div>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmar senha">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-round btn-lg" value="Criar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
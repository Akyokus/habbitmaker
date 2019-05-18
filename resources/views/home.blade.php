@extends('layouts.app')

@section('content')
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

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Sigara Bırakma</h3>
                            <span class="card-subtitle">muharremkackin</span>
                            <p class="card-text">Bugün 3. günüm devam etmekte zorlanıyorum</p>
                        </div>
                    </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Sigara Bırakma</h3>
                                <span class="card-subtitle">muharremkackin</span>
                                <p class="card-text">Bugün 3. günüm devam etmekte zorlanıyorum</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

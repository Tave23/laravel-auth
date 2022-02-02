@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="title m-b-md">
                        <p>Ciao {{ $loggedUser->name }}, la tua mail è {{ $loggedUser->email }}</p> 
                        <p>Questa è l'area per i loggati</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

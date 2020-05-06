@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Курсы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('settings') }}">Настройки профиля</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Настройки</h5>
                @include('components.settings')
            </div>
        </div>
    </div>
@endsection
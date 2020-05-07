@extends('layouts.app')

@section('content')
<div class="container">
    
    @include('components.message')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(!Auth()->user()->profile)
                @include('components.FillProfile')
            @elseif(Auth()->user()->profile && Auth()->user()->confirmedNumber == 'no')
                @include('components.confirm')
            @else
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('home') }}">Курсы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('settings') }}">Настройки профиля</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title">Курсы</h5>
                        <?php $i = 1; ?>
                        @foreach ($courses as $course)
                         <p class="card-text">{{$i++}}. <a href="/course/{{$course->id}}/show">{{$course->courseName}}</a></p>
                        @endforeach
                    </div>
                </div>

            @endif
        </div>
    </div>
</div>
@include('layouts.captchaJavascript')
@endsection

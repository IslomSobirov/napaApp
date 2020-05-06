@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <form action="{{route('userEdit')}}" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="">Имя</label>
                        <input type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="">Фамилия</label>
                        <input type="text" value="{{$user->surname}}" class="form-control @error('name') is-invalid @enderror" name="surname">
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="number" class=" col-form-label text-md-right">{{ __('Номер телефона') }}</label>
                        <span class="mySpan"> (99 8553344)</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+(998)</span>
                                </div>
                                <input value="{{$user->number}}" type="tel" class="form-control @error('number') is-invalid @enderror"
                                    placeholder="998403675" name="number" value="{{ old('number') }}"
                                    required autocomplete="number" aria-label="number" aria-describedby="basic-addon1"
                                    pattern="[0-9]{9}">
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('Адрес э-почты') }}</label>

                        <div class="">
                            <input value="{{$user->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            
            <div class="form-group">
                <button class="btn btn-warning" type="submit">Редактировать</button>
                <button class="btn btn-primary" type="submit">Отмена</button>
            </div>
        {{-- </form> --}}
    </div>
@endsection
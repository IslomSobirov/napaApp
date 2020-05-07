@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Подтвердите свой номер пожалуйста</h3>
        <form method="POST" action="{{ route('confirm') }}">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="form-group">
                        <input name="smsFromUser" placeholder="Введите смс номер сюда" type="text" class="form-control">
                        <input value="{{ $randnumber }}" type="hidden" name="randNumber">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        {{-- <a class="btn btn-success">Изменить номер</a> --}}
                        <a class="btn btn-success">Отправить сообщение</a>
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Подтвердить</button>
            </div>
        </form>
    </div>
@endsection
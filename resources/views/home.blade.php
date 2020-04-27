@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(!Auth()->user()->profile)
            <div class="card">
                <div class="card-header">Анкета</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('createProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <a href="/images/myw3schoolsimage.jpg" download>aaa</a> --}}
                        <input name="user_id" type="hidden" value="{{Auth()->user()->id}}">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Имя</label>
                                    <input type="text" value="{{Auth()->user()->name}}" class="form-control @error('name') is-invalid @enderror" name="name">
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
                                    <input type="text" value="{{Auth()->user()->surname}}" class="form-control @error('name') is-invalid @enderror" name="surname">
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
                                            <input value="{{Auth()->user()->number}}" type="tel" class="form-control @error('number') is-invalid @enderror"
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
                                        <input value="{{Auth()->user()->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
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
                        <div class="row">
                            <div class="col-3-lg col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Фото</label>
                                    <div class="custom-file">
                                        <input name="image" accept="image/*" type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFileLangHTML">
                                        <label class="custom-file-label" for="customFileLangHTML" data-browse="загрузить фото">Upload image</label>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-3-lg col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Пасспорт копия</label>
                                    <div class="custom-file">
                                        <input name="passportCopy" accept="" type="file" class="custom-file-input @error('passportCopy') is-invalid @enderror" id="customFileLangHTML">
                                        <label class="custom-file-label" for="customFileLangHTML" data-browse="загрузить пасспорт копия">Upload image</label>
                                        @error('passportCopy')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-3-lg col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Инн</label>
                                    <div class="custom-file">
                                        <input name="inn" accept="" type="file" class="custom-file-input @error('inn') is-invalid @enderror" id="customFileLangHTML">
                                        <label class="custom-file-label" for="customFileLangHTML" data-browse="загрузить инн">Upload image</label>
                                        @error('inn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-3-lg col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Инн 2 </label><span class="mySpan"> (не обязательно)</span>
                                    <div class="custom-file">
                                        <input name="inn2" accept="" type="file" class="custom-file-input" id="customFileLangHTML">
                                        <label class="custom-file-label" for="customFileLangHTML" data-browse="загрузить инн 2">Upload image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                {{-- <label for="password-confirm">{{ __('Подтверждение что вы не бот') }}</label> --}}
                                <div class="col-md-3 col-lg-3">
                                    <div class="captcha" style="display:flex">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-success ml-2"><i class="fa fa-refresh" id="refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <input placeholder="контент картинки" type="text" name="captcha" id="captcha" class="form-control @error('captcha') is-invalid @enderror">
                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input name="agreement" type="checkbox" class="custom-control-input @error('agreement') is-invalid @enderror" id="defaultUnchecked">
                                <label class="custom-control-label" for="defaultUnchecked"><a href="/" target="blank">Условия договора</a></label>
                                @error('agreement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-warning" type="submit">Сохранить</button>
                            <button class="btn btn-primary" type="submit">Отмена</button>
                        </div>
                    </form>

                    <form method="POST" action="https://test.paycom.uz/" target="_blank">

                        <input type="hidden" name="lang" value="ru" />
                        <input type="hidden" name="callback_timeout" value="0" />
                        <input type="hidden" name="callback" value="" />
                        <input type="hidden" name="merchant" value="" />
                        
                        <input type="hidden" name="amount" value="50 000" />
                        <input type="hidden" name="account[1]" value="COURSE_ID" />
                        <button class="payme_button btn btn-default btn-xs has-ripple" type="submit">
                            Оплатить через Payme
                        </button>
                        
                    </form>

                </div>
            </div>
            @else
                <p>Выберите курс которого вы хотите купить</p>
            @endif
        </div>
    </div>
</div>
@include('layouts.captchaJavascript')
@endsection

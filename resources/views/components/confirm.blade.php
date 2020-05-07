<h3 class="text-center mb-4">Подтвердите свой номер пожалуйста</h3>
<div class="row">
    <div class="col-7">
        <div class="form-group">
            <input name="number" readonly value="{{ auth()->user()->profile->number }}" type="number" class="form-control">
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <a href="{{ route('sendSms') }}" class="btn btn-success">Отправить сообщение</a>
            {{-- <a class="btn btn-success">Изменить номер</a> --}}
        </div>
    </div>
</div>
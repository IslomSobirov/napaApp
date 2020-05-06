@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>{{$course->courseName}}</h3>
    
    <p>{{$course->courseResult}}</p>

    <p class="mt-4">Купить курс</p>
    <form method="POST" action="https://checkout.paycom.uz">
        <input type="hidden" name="merchant" value="5df08d66b822662d5f5958a0"/>
        <input type="hidden" name="amount" value="100000"/>
        <input type="hidden" name="account[full_name]" value="{{auth()->user()->surname }} {{auth()->user()->name}} "/>
        <input type="hidden" name="account[phone_number]" value="{{auth()->user()->number}} "/>
        <input type="hidden" name="account[contract_id]" value="{{$course->id}}"/>
        <button type="submit" style="cursor: pointer;
            border: 1px solid #ebebeb;
            border-radius: 6px;
            background: linear-gradient(to top, #f1f2f2, white);
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
        ">
        <img style="width: 42px;
        height: 42px;
        " src="http://cdn.payme.uz/buttons/button_small_RU.svg">
        
        </button>
    </form>
</div>
@endsection
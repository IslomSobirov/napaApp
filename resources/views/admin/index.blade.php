@extends('layouts.app')

@section('content')
<div class="container">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.message')
    <div class="row">
        <div class="col-xl-9 col-md-9">
            <div class="form-group">
                <input name="search" id="searchUser" type="text" placeholder="Поиск.." class="form-control">
            </div>
        </div>
        <script>
            $(document).ready(function(){
                let searchUser = $("#searchUser");
                
                searchUser.on('keyup', function(){
                    let value = $(this).val();
                    console.log(value);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '/searchUser',
                        data: value,
                        success: function(data) {
                            
                            console.log(data);
                        }
                    });

                });
            });
        </script>
        <div class="col-xl-3 col-md-3">
            <style>
            #myInput {
                padding: 20px;
                margin-top: -6px;
                border: 0;
                border-radius: 0;
                background: #f1f1f1;
            }
            </style>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">JavaScript</a></li>
                <li><a href="#">jQuery</a></li>
                <li><a href="#">Bootstrap</a></li>
                <li><a href="#">Angular</a></li>
                </ul>
            </div>

            <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
            </script>

        </div>
    </div>
    <div class="row">
    @foreach($users as $user)
            <div id="col" class="col-md-4 col-xl-4 mb-4 col-12 m-0">
                <div class="card mr-0" style="width: 18rem;">
                    <img class="card-img-top" height="280px" src="{{$user->profile ? asset('storage/avatars/' .$user->profile->image) : asset('img/default-user.png')}}" alt="Card image cap">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Номер телефона: +(998) {{ $user->number }}</li>
                        <li class="list-group-item">Эл-почта:  {{ $user->email }}</li>
                        @if($user->profile)
                        <li class="list-group-item">
                            <a href="{{ asset('storage/passportCopies/' .$user->profile->passportCopy) }}">
                                Пасспорт копия
                            </a> |
                            <a target="_blank" href="{{ asset('storage/inn/' .$user->profile->inn) }}">
                                Инн
                            </a>
                            @if($user->profile->inn2)
                            | 
                            <a target="_blank" href="{{ asset('storage/inn/' .$user->profile->inn2) }}">Инн 2</a>
                            @endif
                        </li>
                        @else
                            <li class="list-group-item">
                                Анкета пока не заполнено
                            </li>
                        @endif
                    </ul>
                    <div class="card-body" style="min-height:80px">
                        @if( !$user->isAdmin() )
                        <a href="{{ route('makeAdmin', ['id' => $user->id]) }}" class="card-link m-0 badge badge-primary">Сделать админом</a>  
                            | 
                        @endif
                        <a href="{{ route('userEditPage', ['id' => $user->id]) }}" class="card-link m-0 badge badge-warning">Редактировать</a>  
                            |  
                        <a href="{{ route('deleteUser', ['id' => $user->id]) }}" class="card-link m-0 badge badge-danger">Удалить</a>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>

</div>
@endsection
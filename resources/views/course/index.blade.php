@extends('layouts.app')

@section('content')
<div class="container">
    <?php $i = 1; ?>
    @foreach ($courses as $course)
        <h3>{{$i++}}. <a href="">{{$course->courseName}}</a></h3>
    @endforeach
</div>
@endsection
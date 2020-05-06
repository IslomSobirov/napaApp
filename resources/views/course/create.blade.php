@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/course" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="">ИФО преподавателя</label>
                        <input type="text" class="form-control @error('teacherName') is-invalid @enderror" name="teacherName">
                        @error('teacherName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="">Имя курса</label>
                        <input type="text" class="form-control @error('courseName') is-invalid @enderror" name="courseName">
                        @error('courseName')
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
                        <label for="email" class="col-form-label text-md-right">Длительность курса</label>

                        <div class="">
                            <input type="text" class="form-control @error('courseDuration') is-invalid @enderror" name="courseDuration"  required>

                            @error('courseDuration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="coursePlan" class="col-form-label text-md-right">План курса</label>

                        <div class="">
                            <input type="text" class="form-control @error('coursePlan') is-invalid @enderror" name="coursePlan" required>

                            @error('coursePlan')
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
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="courseResult" class="col-form-label text-md-right">Результат курса</label>

                        <div class="">
                            <textarea name="courseResult" cols="10" rows="5" class="form-control @error('courseResult') is-invalid @enderror"></textarea>
                            

                            @error('courseResult')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="courseSpeciality" class="col-form-label text-md-right">Специальность</label>

                        <div class="">
                            <textarea name="courseSpeciality" cols="10" rows="5" class="form-control @error('courseSpeciality') is-invalid @enderror"></textarea>

                            @error('courseSpeciality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="courseStart" class="col-form-label text-md-right">Начало курса</label>

                        <div class="">
                            <input type="text" class="form-control @error('courseStart') is-invalid @enderror" name="courseStart"  required>

                            @error('courseStart')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="groupNumber" class="col-form-label text-md-right">Количества групп</label>

                        <div class="">
                            <input type="text" class="form-control @error('groupNumber') is-invalid @enderror" name="groupNumber" required>

                            @error('groupNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="studentNumber" class="col-form-label text-md-right">Количества студентов (на каждую группу)</label>

                        <div class="">
                            <input type="text" class="form-control @error('studentNumber') is-invalid @enderror" name="studentNumber" required>

                            @error('studentNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="form-group">
                <button class="btn btn-warning" type="submit">Сохранить</button>
                <a class="btn btn-primary" href="/admin">Назад</a>
            </div>
        </form>
    </div>
@endsection
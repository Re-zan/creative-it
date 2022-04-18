@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">

        <div class="col-6 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2>Add Course Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('course.store') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="course icon " name="course_icon" class="form-control my-3">
                        @error('course_icon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" name="course_name" placeholder="course_name" class="form-control my-3">
                        @error('course_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary"> Insert Course item Item</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

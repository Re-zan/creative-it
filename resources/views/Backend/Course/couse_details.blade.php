@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">


        <div class="col-6 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2>Add Course Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('courseleeds.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select class="form-select form-control my-3" aria-label="Default select example" name="course_id">
                            <option selected>Select the course name</option>
                            @foreach ($course as $coursetopic)
                                <option value="{{ $coursetopic->id }}">{{ $coursetopic->course_name }}</option>
                            @endforeach


                        </select>

                        <input type="text" placeholder="course_title " name="course_title" class="form-control my-3">
                        @error('course_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" name="course_description" placeholder="course_description"
                            class="form-control my-3">
                        @error('course_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="file" name="course_img" placeholder="course_img" class="form-control my-3">
                        @error('course_img')
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

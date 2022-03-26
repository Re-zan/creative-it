@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">

        <div class="col-8 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2>Add About Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="about_image" class="form-control my-3">
                        @error('about_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="About img title" name="about_img_title" class="form-control my-3">
                        @error('about_img_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="About title" name="about_title" class="form-control my-3">
                        @error('about_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <textarea name="about_details" class="form-control my-3"></textarea>

                        @error('about_details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary"> Insert About Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

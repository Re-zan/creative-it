@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">

        <div class="col-8 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2>Add About Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="about_image" class="form-control my-3">
                        <img style="width:200px;" src="{{ asset('storage/img/' . $about->about_image) }}" alt="">
                        @error('about_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" value={{ $about->about_img_title }} placeholder="About img title"
                            name="about_img_title" class="form-control my-3">
                        @error('about_img_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" value="{{ $about->about_title }}" placeholder="About title" name="about_title"
                            class="form-control my-3">
                        @error('about_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <textarea name="about_details" class="form-control my-3">{{ $about->about_details }}</textarea>


                        @error('about_details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary"> Update About Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">

        <div class="col-8 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2> Banner Item</h2>
                </div>
                <div class="card-body" style="background-color:  #969392;">
                    <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" placeholder="banner title" name="banner_title" class="form-control my-3"
                            value="{{ $banner->banner_title }}">
                        @error('banner_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="file" name="banner_image" class="form-control my-3">
                        <img src="{{ asset('storage/img/' . $banner->banner_image) }}" alt=""><br>
                        @error('banner_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary"> Update Banner Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

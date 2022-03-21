@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">

        <div class="col-8 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2> Gallery Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" placeholder="Gallery title" name="gallery_title"
                            value="{{ $gallery->gallery_title }}" class="form-control my-3">
                        @error('gallery_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="file" name="gallery_image" class="form-control my-3">
                        <img src="{{ asset('storage/img/' . $gallery->gallery_image) }}" alt=""> <br>
                        @error('gallery_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <button type="submit" class="btn btn-primary"> Upadate Gallery Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

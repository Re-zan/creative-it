@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">
        @if (session()->has('success'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                </div>
                <div class="toast-body" style="background-color: #39a4ce; color:aliceblue; padding: 10px;">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="col-8 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2>Add Banner Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="banner title" name="banner_title" class="form-control my-3">
                        @error('banner_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="file" name="banner_image" class="form-control my-3">
                        @error('banner_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary"> Insert Banner Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

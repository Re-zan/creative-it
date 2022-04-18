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

                    <h2>Add Header Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="notice" name="notice" class="form-control my-3">
                        @error('notice')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="notice_title" name="notice_title" class="form-control my-3">
                        @error('notice_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="file" name="logo" class="form-control my-3">
                        @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary"> Insert Header Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

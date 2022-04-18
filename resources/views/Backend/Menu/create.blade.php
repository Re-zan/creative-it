@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">

        <div class="col-8 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2>Add Menu Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('menu.store') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="menu_name" name="menu_name" class="form-control my-3">
                        @error('menu_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <input type="text" placeholder="menu_link" name="menu_link" class="form-control my-3">
                        @error('menu_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <br>
                        <button type="submit" class="btn btn-primary"> Insert Menu Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

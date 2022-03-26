@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">

        <div class="col-8 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2>Add Seminar Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('seminar.store') }}" method="POST">
                        @csrf
                        <label for="text">Seminar Topic:</label>
                        <input type="text" placeholder="Seminar topic" name="topic" class="form-control my-3">
                        @error('topic')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <br>
                        <label for="date">Seminar Date:</label>
                        <input type="date" placeholder="Seminar topic" name="date" class="form-control my-3">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>

                        <label for="time">Seminar Time:</label>
                        <input type="time" placeholder="Seminar time" name="time" class="form-control my-3">
                        @error('time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <br>
                        <button type="submit" class="btn btn-primary"> Insert Seminar Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

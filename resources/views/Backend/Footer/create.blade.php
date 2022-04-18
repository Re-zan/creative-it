@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">

        <div class="col-8 my-5 text-center">

            <div class="card">
                <div class="card-header" style="background-color: #39a4ce; color:aliceblue">

                    <h2>Add Footer Item</h2>
                </div>
                <div class="card-body" style="background-color:  #fcf8f3;">
                    <form action="{{ route('footer.store') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="footer_tag_title" name="footer_tag_title" class="form-control my-3">
                        @error('footer_tag_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="footer_text" name="footer_text" class="form-control my-3">
                        @error('footer_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="footer_link_text" name="footer_link_text" class="form-control my-3">
                        @error('footer_link_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="footer_contact_text" name="footer_contact_text"
                            class="form-control my-3">
                        @error('footer_contact_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="footer_fb_link" name="footer_fb_link" class="form-control my-3">
                        @error('footer_fb_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="footer_youtube_link" name="footer_youtube_link"
                            class="form-control my-3">
                        @error('footer_youtube_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="footer_linkedIn_link" name="footer_linkedIn_link"
                            class="form-control my-3">
                        @error('footer_linkedIn_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" placeholder="footer_insta_link" name="footer_insta_link"
                            class="form-control my-3">
                        @error('footer_insta_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary"> Insert Footer Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 text-center my-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial NO</th>
                        <th scope="col">Banner Title</th>
                        <th scope="col">Banner Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($banner as $key=>$bannerdata)
                        <tr>
                            <th>{{ ++$key }}</th>
                            <td>{{ $bannerdata->banner_title }}</td>
                            <td>
                                <img style="width:200px;" src="{{ asset('storage/img/' . $bannerdata->banner_image) }}"
                                    alt="{{ $bannerdata->banner_title }}">
                            </td>

                            <td>
                                <a href="{{ route('banner.restore', $bannerdata->id) }}"
                                    class="btn btn-sm bg-info text-white">Restore</a>
                                <form class="d-inline-block " action="{{ route('banner.delete', $bannerdata->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm bg-danger text-white">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5"> NO POST YET</td>
                    @endforelse


                </tbody>
            </table>



        </div>
    </div>
@endsection

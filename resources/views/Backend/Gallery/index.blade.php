@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 text-center my-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial NO</th>
                        <th scope="col">Gallery Title</th>
                        <th scope="col">Gallery Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($gallery as $key=>$gallerydata)
                        <tr>
                            <th>
                                {{ ++$key }}
                            </th>
                            <td>{{ $gallerydata->gallery_title }}</td>
                            <td>
                                <img style="width:100px;" src="{{ asset('storage/img/' . $gallerydata->gallery_image) }}"
                                    alt="{{ $gallerydata->gallery_title }}">
                            </td>
                            <td>
                                <a href=""
                                    class="btn btn-sm {{ $gallerydata->status == 1 ? 'bg-info text-white' : 'bg-dark text-white' }}">
                                    @if ($gallerydata->status == 1)
                                        Active
                                    @else
                                        Deactive
                                    @endif
                                </a>
                                <a href="{{ route('gallery_status', $gallerydata->id) }}"
                                    class="btn btn-sm {{ $gallerydata->status == 1 ? 'bg-dark text-white' : 'bg-info text-white' }}">
                                    @if ($gallerydata->status == 1)
                                        Deactive
                                    @else
                                        Active
                                    @endif
                                </a>


                            </td>
                            <td>
                                <a href="{{ route('gallery.edit', $gallerydata->id) }}"
                                    class="btn btn-sm  bg-success text-white"> Edit</a>
                                <form class="d-inline-block" action="{{ route('gallery.destroy', $gallerydata->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn_delete btn btn-sm bg-danger text-white">Delete</button>
                                </form>


                            </td>
                        </tr>
                    @empty
                    @endforelse




                </tbody>
            </table>



        </div>
    </div>
@endsection

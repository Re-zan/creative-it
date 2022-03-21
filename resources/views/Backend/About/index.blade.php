@extends('layouts.backendapp')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 text-center my-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial NO</th>
                        <th scope="col">about_image</th>
                        <th scope="col">about_img_title</th>
                        <th scope="col">about_title</th>
                        <th scope="col">about_details</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($about as $key=>$aboutdata)
                        <tr>
                            <th>
                                {{ ++$key }}
                            </th>
                            <td>
                                <img style="width:200px;" src="{{ asset('storage/img/' . $aboutdata->about_image) }}"
                                    alt="">
                            </td>
                            <td>
                                {{ $aboutdata->about_img_title }}
                            </td>
                            <td>
                                {{ $aboutdata->about_title }}
                            </td>
                            <td>
                                {{ $aboutdata->about_details }}
                            </td>
                            <td>
                                <a href=""
                                    class="btn btn-sm {{ $aboutdata->status == 1 ? 'bg-info text-white' : 'bg-dark text-white' }}">
                                    @if ($aboutdata->status == 1)
                                        Active
                                    @else
                                        Deactive
                                    @endif
                                </a>
                                <a href="{{ route('about_status', $aboutdata->id) }}"
                                    class="btn btn-sm {{ $aboutdata->status == 1 ? 'bg-dark text-white' : 'bg-info text-white' }}">
                                    @if ($aboutdata->status == 1)
                                        Deactive
                                    @else
                                        Active
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('about.edit', $aboutdata->id) }}"
                                    class="btn btn-sm  bg-success text-white">
                                    Edit
                                </a>
                                <form action="{{ route('about.destroy', $aboutdata->id) }}" method="POST">
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

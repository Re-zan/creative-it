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
                        <th scope="col">Status</th>
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
                                <a href=""
                                    class="btn btn-sm {{ $bannerdata->status == 1 ? 'bg-info text-white' : 'bg-dark text-white' }}">
                                    @if ($bannerdata->status == 1)
                                        Active
                                    @else
                                        Deactive
                                    @endif
                                </a>
                                <a href="{{ route('banner.status', $bannerdata->id) }}"
                                    class="btn btn-sm {{ $bannerdata->status == 1 ? 'bg-dark text-white' : 'bg-info text-white' }}">
                                    @if ($bannerdata->status == 1)
                                        Deactive
                                    @else
                                        Active
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('banner.edit', $bannerdata->id) }}"
                                    class="btn btn-sm  bg-success text-white">
                                    Edit
                                </a>
                                <button class="btn btn-sm bg-danger text-white del__button">Delete</button>
                                <form class="d-inline-block del__form"
                                    action="{{ route('banner.destroy', $bannerdata->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5"> NO POST YET</td>
                    @endforelse


                </tbody>

            </table>
            <span>
                {{ $banner->links() }}
            </span>


        </div>
    </div>
@endsection
@section('cust_js')
    <script>
        jQuery('.del__button').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery(this).next('.del__form').submit()

                }
            })
        });
    </script>
@endsection

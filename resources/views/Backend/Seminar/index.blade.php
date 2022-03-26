@extends('layouts.backendapp')

@section('content')
    <div class="row">
        <div class="col-12 my-10">
            <h2 class="mb-4">All Seminar Item</h2>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($seminar as $key => $seminar_topic)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#seminar{{ $key }}" type="button" role="tab" aria-controls="home"
                            aria-selected="true">{{ $seminar_topic->topic }}</button>
                    </li>
                @endforeach


            </ul>

            <div class="tab-content mb-4" id="myTabContent">
                @foreach ($seminar as $index => $seminar_topic)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="seminar{{ $index }}"
                        role="tabpanel" aria-labelledby="home-tab">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Serial NO</th>
                                    <th scope="col">Topic</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seminar->leeds as $leeddata)
                                @endforeach
                                <tr>
                                    <td>{{ $leeddata->name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>




                            </tbody>
                        </table>


                    </div>
                @endforeach



            </div>

        </div>
    </div>
@endsection

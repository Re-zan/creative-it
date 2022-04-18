@extends('layouts.forntendapp')

@section('content')
    <!--============== Banner Part Goes Here ================-->
    <section id="banner">
        <div class="slider-main">

            @forelse ($Allbanner as  $bannerdata)
                <div class="slider-item">

                    <img src="{{ asset('storage/img/' . $bannerdata->banner_image) }}"
                        alt="{{ $bannerdata->banner_title }}" class="w-100">
                </div>
            @empty
            @endforelse


        </div>
    </section>

    <!--============== About Part Goes Here ================-->
    <section id="about">
        <div class="container">
            <div class="row">
                @forelse ($allabout as $aboutdata)
                    <div class="col-lg-7 order-lg-2">
                        <div class="about-text">
                            <h2>{{ $aboutdata->about_title }}</h2>
                            <p>{{ $aboutdata->about_details }}</p>

                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-0 order-lg-1">
                        <div class="about-img">
                            <img src="{{ asset('storage/img/' . $aboutdata->about_image) }}" alt="about"
                                class="img-fluid">
                        </div>
                    </div>

                @empty
                @endforelse

            </div>
        </div>
    </section>

    <!-- courses part -->
    <section id="courses">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="common_head text-center">
                        <h3>Our Courses</h3>
                        <p>Explore the weapons of Latest Information Technology!</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 pr-1">
                    <div class="courses_tab">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <ul class="nav nav-pills">
                                @foreach ($allcourse as $key => $coursedata)
                                    <li>
                                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                            id="v-pills-{{ $key }}-tab" data-toggle="pill"
                                            href="#v-pills-{{ $key }}" role="tab" aria-controls="v-pills-Graphics"
                                            aria-selected="true">
                                            <span
                                                class="{{ $coursedata->course_icon }}"></span>{{ $coursedata->course_name }}
                                        </a>
                                    </li>
                                @endforeach




                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-0">
                    <div class="courses_tab_sidebar">
                        <div class="tab-content" id="v-pills-tabContent">
                            @foreach ($allcourse as $index => $coursedata)
                                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                    id="v-pills-{{ $index }}" role="tabpanel"
                                    aria-labelledby="v-pills-Graphics-tab">
                                    @foreach ($coursedata->leeds as $courseitem)
                                        <div class="row">
                                            <div class="col-lg-8 course_items">
                                                <h3>{{ $courseitem->course_title }}</h3>
                                                <p>{{ $courseitem->course_description }}</p>
                                                <a href="#"><i class="fas fa-angle-double-right"></i>Read more</a>

                                                <div class="seat text-start">

                                                    <p><a href="#"><img src="imgs/seat.png" alt=""><span> Admission Going
                                                                On</span></a></p>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/img/' . $courseitem->course_img) }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endforeach




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- courses part -->







    <!--============== Seminar Part Goes Here ================-->
    <section id="seminar" class="mt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <div class="card border-0">
                        <div class="card-header text-center">
                            Upcoming Seminar Schedule
                        </div>
                        <div class="card-body text-center">
                            <div class="table-responsive seminar-table seminar-modal">
                                <table class="table table-striped mt-3 table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Topic</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($allseminar as $seminardata)
                                            <tr>
                                                <td>{{ $seminardata->topic }}</td>
                                                <td>{{ $seminardata->date }}</td>
                                                <td>{{ $seminardata->time }}</td>
                                                <td>
                                                    <a href="{{ route('seminar/join') }}" class="btn-sm">Join</a>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--============== Gallery Part Goes Here ================-->
    <section id="gallery" class="py-lg-5">
        <div class="container px-sm-0">
            <div class="row">
                <div class="col-lg-12 pt-sm-3 pt-md-0">
                    <div class="courses-head">
                        <h2>Our Gallery</h2>
                        <p>Explore the weapons of Latest Information Technology!</p>
                    </div>
                </div>
            </div>
            <div class="row px-lg-0">
                @forelse ($allgallery as $gallerydata)
                    <div class="col-lg-4 col-sm-6 col-md-4">
                        <div class="gal-img">
                            <a href="{{ asset('storage/img/' . $gallerydata->gallery_image) }}" data-lightbox="roadtrip">
                                <img src="{{ asset('storage/img/' . $gallerydata->gallery_image) }}" alt="Gallery Image"
                                    class="img-fluid w-100">
                            </a>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>



    </section>
@endsection

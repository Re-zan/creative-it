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

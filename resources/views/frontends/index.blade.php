@extends('frontends.layouts')

@section('title', 'Home')

@section('content')
    <section class="slider_section">
        <ul id="main-slider" class="owl-carousel main_slider">
            <li class="main_slide d-flex align-items-center"
                style="background-image: url({{ asset('/fe') }}/img/slide-1.jpg);">
                <div class="container">
                    <div class="slider_content">
                        <h3>Its Not Just a Haircut, Its an Experience.</h3>
                        <h1>Being a barber is about <br>taking care of the people.</h1>
                        <p>Our barbershop is the territory created purely for males who appreciate<br> premium quality,
                            time and flawless look.</p>
                        <a href="#appointments" class="default_btn">Make Appointment</a>
                    </div>
                </div>
            </li>
            <li class="main_slide d-flex align-items-center"
                style="background-image: url({{ asset('/fe') }}/img/slide-2.jpg);">
                <div class="container">
                    <div class="slider_content">
                        <h3>Classic Hair Style & Shaves.</h3>
                        <h1>Our hair styles<br>enhances your smile.</h1>
                        <p>Our barbershop is the territory created purely for males who appreciate<br> premium quality,
                            time and flawless look.</p>
                        <a href="#appointments" class="default_btn">Make Appointment</a>
                    </div>
                </div>
            </li>
            <li class="main_slide d-flex align-items-center"
                style="background-image: url({{ asset('/fe') }}/img/slide-3.jpg);">
                <div class="container">
                    <div class="slider_content">
                        <h3>Its Not Just a Haircut, Its an Experience.</h3>
                        <h1>Where mens want <br>to look there very best.</h1>
                        <p>Our barbershop is the territory created purely for males who appreciate<br> premium quality,
                            time and flawless look.</p>
                        <a href="#appointments" class="default_btn">Make Appointment</a>
                    </div>
                </div>
            </li>
        </ul>
    </section>

    <section id="about" class="about_section bd-bottom padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_content align-center">
                        <h3 class="wow fadeInUp" data-wow-delay="100ms">Introducing</h3>
                        <h2 class="wow fadeInUp" data-wow-delay="200ms">Oesman's <br>Barbershop</h2>
                        <img class="wow fadeInUp" data-wow-delay="500ms" src="{{ asset('/assets/img/brand/logo-1.jpeg') }}"
                            width="200" alt="logo">
                        <p class="wow fadeInUp" data-wow-delay="600ms">
                            Oesman's Barbershop merupakan salah satu Barbershop
                            yang terletak di jantung kota solo, tepatnya di J. Dr. Wahidin no 3B, Penumping, Kec. Laweyan,
                            Kota Surakarta, Jawa Tengah. Nama Oesman's Barbershop diambil dari nama kakek pemilik Oesman's
                            Barbershop diambil dari nama kakek pemilik barber tersebut, karena
                            kegemaran kakeknya yang suka memangkas rambut meniadi
                            inspirasi bisnis tersebut. Pada aspek kebutuhan rang, terdapat area
                            tunggu, area potong rambut, area cuci rambut, area display dan kasu.
                            Oesman's Barbershop beroperasi setiap hari, mulai dari jam 10.00-21.00 WIB
                        </p>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="about_img">
                        <img src="{{ asset('/fe') }}/img/about-1.jpg" alt="idea-images" class="about_img_1 wow fadeInLeft"
                            data-wow-delay="200ms">
                        <img src="{{ asset('/fe') }}/img/about-2.jpg" alt="idea-images" class="about_img_2 wow fadeInRight"
                            data-wow-delay="400ms">
                        <img src="{{ asset('/fe') }}/img/about-3.jpg" alt="idea-images" class="about_img_3 wow fadeInLeft"
                            data-wow-delay="600ms">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service_section bg-grey padding" id="services">
        <div class="container">
            <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                <h3>Trendy Salon &amp; Spa</h3>
                <h2>Our Services</h2>
                <div class="heading-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="200ms">
                    <div class="service_box">
                        <i class="bs bs-scissors-1"></i>
                        <h3>Haircut Styles</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="300ms">
                    <div class="service_box">
                        <i class="bs bs-razor-2"></i>
                        <h3>Beard Triming</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="400ms">
                    <div class="service_box">
                        <i class="bs bs-brush"></i>
                        <h3>Smooth Shave</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="500ms">
                    <div class="service_box">
                        <i class="bs bs-hairbrush-1"></i>
                        <h3>Face Masking</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="book_section padding" id="appointments">
        <div class="book_bg"></div>
        <div class="map_pattern"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <form action="{{ route('create-appointment') }}" method="post" id="appointment_form"
                        class="form-horizontal appointment_form">
                        @csrf
                        <div class="book_content">
                            <h2>Make an appointment</h2>
                            <p>Barber is a person whose occupation is mainly to cut, dress, groom, style, and shave men's
                                and boys' hair.</p>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 padding-10">
                                <input type="text" id="customer_name" name="customer_name" class="form-control"
                                    placeholder="Name" required>
                            </div>
                            <div class="col-md-6 padding-10">
                                <input type="email" id="customer_email" name="customer_email" class="form-control"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 padding-10">
                                <input type="text" id="customer_phone" name="customer_phone" class="form-control"
                                    placeholder="Your Phone No" required>
                            </div>
                            <div class="col-md-6 padding-10">
                                <input type="text" id="appointment_date" name="appointment_date" class="form-control"
                                    placeholder="Appointment Date" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 padding-10">
                                <select class="form-control" id="service_id" name="service_id" required>
                                    <option value="">Services</option>
                                    @foreach ($services as $service)
                                        @forelse ($service as $serv)
                                            <option value="{{ $serv->id }}">{{ $serv->name }}</option>
                                        @empty
                                        @endforelse
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 padding-10">
                                <select class="form-control" id="barber_id" name="barber_id" required>
                                    <option value="">Choose Barbers</option>
                                    @foreach ($barbers as $barber)
                                        <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button id="app_submit" class="default_btn" type="submit">Make Appointment</button>
                        <div id="msg-status" class="alert" role="alert"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="team_section bd-bottom padding">
        <div class="container">
            <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                <h3>Trendy Salon &amp; Spa</h3>
                <h2>Our Barbers</h2>
                <div class="heading-line"></div>
            </div>
            <ul class="team_members row">
                @forelse ($barbers as $barber)
                    <li class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="200ms">
                        <div class="team_member">
                            <img src="{{ asset('/uploads/images/' . $barber->avatar) }}" alt="Team Member">
                            <div class="overlay">
                                <h3>{{ $barber->name }}</h3>
                            </div>
                        </div>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>
    </section>

    <section class="pricing_section bg-grey bd-bottom padding" id="pricings">
        <div class="container">
            <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                <h2>Our Barber Pricing</h2>
                <div class="heading-line"></div>
            </div>
            <div class="row">
                @forelse ($services as $service)
                    <div class="col-lg-4 col-md-6 sm-padding">
                        <div class="price_wrap">
                            <ul class="price_list">
                                @forelse ($service as $serv)
                                    <li>
                                        <h4>{{ $serv->name }}</h4>
                                        <span class="price">{{ $serv->price_show }}K</span>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section class="cta_section padding">
        <div class="container">
            <div class="display-table">
                <div class="table-cel">
                    <div class="cta_content align-center wow fadeInUp" data-wow-delay="300ms">
                        <h2>Oesman's <br> Barbershop.</h2>
                        <p>Oesman's Barbershop merupakan salah satu Barbershop
                            yang terletak di jantung kota solo, tepatnya di J. Dr. Wahidin no 3B, Penumping, Kec. Laweyan,
                            Kota Surakarta, Jawa Tengah. Nama Oesman's Barbershop diambil dari nama kakek pemilik Oesman's
                            Barbershop diambil dari nama kakek pemilik barber tersebut, karena
                            kegemaran kakeknya yang suka memangkas rambut meniadi
                            inspirasi bisnis tersebut. Pada aspek kebutuhan rang, terdapat area
                            tunggu, area potong rambut, area cuci rambut, area display dan kasu.
                            Oesman's Barbershop beroperasi setiap hari, mulai dari jam 10.00-21.00 WIB</p>
                        <a href="#appointments" class="default_btn">Make Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $("#appointment_date").flatpickr();

        $(function() {
            var $form = $("#appointment_form");
            var $formMessages = $("#msg-status");

            $form.on("submit", function(event) {
                event.preventDefault();

                $.ajax({
                        type: "POST",
                        url: $form.attr("action"),
                        data: $form.serialize()
                    })
                    .done(function(response) {
                        $formMessages.removeClass("alert-danger alert-success");

                        if (response.status === "success") {
                            $formMessages
                                .addClass("alert-success")
                                .html(response.message);
                            $form[0].reset();
                        } else if (response.status === "error") {
                            $formMessages
                                .addClass("alert-danger")
                                .html(response.message);
                        }
                    })
                    .fail(function(jqXHR) {
                        $formMessages
                            .removeClass("alert-success")
                            .addClass("alert-danger");
                        var errorMessage = jqXHR.responseJSON?.message ||
                            "Oops! An error occurred and your appointment process could not be completed.";
                        $formMessages.html(errorMessage);
                    });
            });
        });
    </script>
@endpush

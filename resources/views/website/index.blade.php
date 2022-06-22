@extends('layouts.website')
@section('content')
    <style>
        .card {
            position: relative;
            width: 320px;
            height: 450px;
            background: #232323;
            border-radius: 20px;
            overflow: hidden;
        }

        .card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fd7e14;
            clip-path: circle(150px at 80% 20%);
            transition: 0.5s ease-in-out;
        }

        .card:hover:before {
            clip-path: circle(300px at 80% -20%);
        }

        .card:after {
            content: 'For Sale';
            position: absolute;
            top: 40%;
            left: 15%;
            font-size: 6em;
            font-weight: 800;
            font-style: italic;
            color: rgba(255, 255, 25, 0.05)
        }

        .card .imgBx {
            position: absolute;
            top: 30%;
            transform: translateY(-50%);
            z-index: 1;
            width: 100%;
            height: 100px;
            transition: 0.5s;
        }

        .card:hover .imgBx {
            top: 0%;
            transform: translateY(0%);

        }



        .card .contentBx {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
            text-align: center;
            transition: 1s;
            z-index: 10;
        }

        .card:hover .contentBx {
            height: 210px;
        }

        .card .contentBx h2 {
            position: relative;
            font-weight: 600;
            letter-spacing: 1px;
            color: #fff;
            margin-top: 15px;
        }

        .card .contentBx .size,
        .card .contentBx .color {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8px 20px;
            transition: 0.5s;
            opacity: 0;
            visibility: hidden;
            padding-top: 0;
            padding-bottom: 0;
        }

        .card:hover .contentBx .size {
            opacity: 1;
            visibility: visible;
            transition-delay: 0.5s;
        }

        .card:hover .contentBx .color {
            opacity: 1;
            visibility: visible;
            transition-delay: 0.6s;
        }

        .top-right {
            position: absolute;
            z-index: 2;
            top: 8px;
            left: 10px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 900;
            background: #ff5722;
            text-align: center;
            color: white;
            padding: 3px;
        }

        .card .contentBx .size h3,
        .card .contentBx .color h3 {
            color: #fff;
            font-weight: 300;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-right: 10px;
        }

        .card .contentBx a {
            display: inline-block;
            padding: 10px 20px;
            background: #fff;
            border-radius: 4px;
            margin-top: 10px;
            text-decoration: none;
            font-weight: 600;
            color: #111;
            opacity: 0;
            transform: translateY(50px);
            transition: 0.5s;
            margin-top: 0;
        }

        .card:hover .contentBx a {
            opacity: 1;
            transform: translateY(0px);
            transition-delay: 0.75s;

        }
    </style>

    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('website/images/img-1.jpg') }}" alt="Los Angeles" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('website/images/img-2.jpg') }}" alt="Chicago" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('website/images/img-3.jpg') }}" alt="New York" class="d-block w-100">
            </div>
        </div>
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="col-md-12 pb-5 text-center" style="background:#182c53;">
        <div class="container">
            <h1 class="text-white text-center pt-5">One-Stop-Shop Services</h1>
            <p class=" display-5 text-center text-white">For Amazon <span class="text-warning">Sellers</span></p>
            <p class="text-white text-center fs-3">Our Services</p>
            <div class="row">

                @foreach ($products as $product)
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <div class="top-label top-right">
                                {{ $product->discount_type == 'Flat' ? 'Flat' : 'Up to %' }} {{ $product->discount }} OFF
                            </div>
                            <div class="imgBx">
                                <img width="100%" height="250px" src="{{ asset('storage/' . $product->image) }}">
                            </div>
                            <div class="contentBx">
                                <h2>{{ $product->title }}</h2>
                                <div class="size">
                                    <h3><span style="color:#fd7e14">Price</span> : ${{ $product->price }}</h3>
                                </div>
                                <div class="color">
                                    <h3><span style="color:#fd7e14">Description</span> : {{ $product->description }}</h3>
                                </div>
                                <button onclick="add_to_cart({{$product->id}})" class="btn btn-primary" role="button">Add to cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><br>
            <a href="{{ route('services') }}" class="btn btn-primary hoverable">View All Services <i
                    class="fa fa-arrows-h"></i></a>
        </div>
    </div><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('website/images/men-walk.jpg') }}" width="100%" class="text-center">
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <p class="display-5 opacity-75">Perfect Solution Makes</p>
                    <p class="display-4 "><strong>A Successful<span class="text-warning">History</span></strong>
                    </p>
                    <br>
                    <p class="h4 opacity-75">Something knows About Our Company</p>
                    <hr>
                    <p class="opacity-75 ">We want our nation to become strong enough to compete in the arena of
                        International market. That can only happen when we will have the familiaity with the new trends
                        trade. We develop opportunities for people who have urge in them to excel in their lives. We
                        provide them a direction which leads them to success. Take a step forward and grab unlimited
                        opportunities.</p>
                </div>
            </div>
        </div>
    </div><br><br>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <img src="{{ asset('website/images/amazon-img.jpg') }}" width="100%">
            </div>
            <div class="col-md-6">
                <div>
                    <p class="display-5 opacity-50">Get A Quote</p>
                    <p class="display-4"><strong>Free</strong> <span class="text-danger">Consultations</span></p>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label h4">Full Name Here</label>
                            <input type="text" class="form-control" id="name" placeholder="eg. Shakeel Ahmad">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label h4">Contact Number</label>
                            <input type="text" class="form-control" id="contact" placeholder="eg. 0301-4962381">
                        </div>
                        <div class="mb-3">
                            <label for="discussion" class="form-label h4">I Would Like To Discuss</label>
                            <input type="text" class="form-control" id="discussion" placeholder="I'm Talking About">
                        </div>
                        <div class="form-group">
                            <label for="comment" class="form-label h4">Leave A Message</label>
                            <textarea class="form-control" rows="5" cols="4" id="comment" placeholder="Write Message"></textarea>
                        </div><br>
                        <button type="submit" class="btn btn-primary pull-right hoverable">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="background: #eef3f9;">
        <div class="container">
            <div class="text-center py-5">
                <p class="display-4 opacity-75">How We Works</p>
                <p class="display-3"><strong>Customer</strong> <span class="text-warning">Reviews</span></p>
                <p class="h4 opacity-75">knows About Our Customer Say</p>
            </div>
            <div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <h3 class="title">Mehar Sahib
                            <span class="post">- SEO</span>
                        </h3>
                        <p class="description">
                            Sometimes we feel hesitate to trust a company with which we have not worked before. Same was
                            the feeling of mine but before working with Angvo I checked their profile thoroughly.
                        </p>
                    </div>
                    <div class="testimonial">
                        <h3 class="title">Mehar Waheed
                            <span class="post">- Web Developer</span>
                        </h3>
                        <p class="description">
                            I can surely that their teachings got me out of many troubles. Sometimes I got really
                            puzzled when I fell my account was not working in a proper way. Angvo sorted out my
                        </p>
                    </div>
                    <div class="testimonial">
                        <h3 class="title">Shakeel Ahmad
                            <span class="post">- Web Developer</span>
                        </h3>
                        <p class="description">
                            Now I do not have to face that panic which I used to bear in the start of my business.
                            Things are good now because of Angvo. Before contacting this company,
                        </p>
                    </div>
                    <div class="testimonial">
                        <h3 class="title">Akhlaq Ahmed
                            <span class="post">- Web Developer</span>
                        </h3>
                        <p class="description">
                            In difficult times, when you find someone who can get you out of the problem and shows you
                            the clear path to explore then there you find the opportunity. I found the one
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php if (isset($_SESSION['message'])) { ?>
        toastMixin.fire({
            animation: true,
            title: ' <?= $_SESSION['message'] ?>'
        });
        <?php unset($_SESSION['message']);
        } ?>
    </script>
    <script>
        $(document).ready(function (){
            @if ((Session::has('success-message')))
            toastMixin.fire({
                animation: true,
                title: '{{ Session::get('success-message') }}'
            });
            @endif
        });
    </script>
@endsection

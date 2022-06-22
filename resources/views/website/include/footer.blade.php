<footer style="background: #182c53;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('website/images/logo-footer.png') }}" class="p-5">
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <p class="text-white text-justify" style="padding-top: 40px;">We are here to start your business
                        on Amazon and make your efforts as profitable as possible. We do this by providing great
                        Services at an affordable price and backed up by the best customer service and support
                        available.</p>
                    <div>
                        <a href="#" class="rounded-circle"><i class="m-1 fa fa-instagram footer-icon "></i></a>
                        <a href="#"><i class="m-1 fa fa-twitter footer-icon"></i></a>
                        <a href="#"><i class="m-1 fa fa-facebook footer-icon"></i></a>
                    </div>
                </div><br>
                <div class="col-md-4">
                    <div class="text-center">
                        <h3 class="text-white mt-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('home_page') }}"
                                    class="text-color text-decoration-none line-height text-hover">Services</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}"
                                    class="text-color text-decoration-none line-height text-hover">About
                                    Us</a>
                            </li>
                            @if (auth()->user())
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="text-color text-decoration-none line-height text-hover">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        class="text-color text-decoration-none line-height text-hover">Logout
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="text-color text-decoration-none line-height text-hover">Login
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="text-color text-decoration-none line-height text-hover">Register
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="text-white mt-4">Subscribe Now</h3>
                    <p class="text-white">Please subscribe now for special<br> notifications and offers</p>
                    <form class="d-flex">
                        <input type="emial" name="email" placeholder="Enter Email Address" class="p-3"
                            style="width:80%;">
                        <button type="submit" class="form-button" style="width:20%;"><i
                                class="far fa-paper-plane fs-5 "></i></button>
                    </form>
                </div>
            </div>
        </div><br><br>
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-3 col-xs-6">
                    <div class="row">
                        <div class="col-md-4 text-center pad-top">
                            <i class="fa fa-map-marker footer-info"></i>
                        </div><br><br>
                        <div class="col-md-8 footer-hover pad-top">
                            <h4 class="title text-white footer-hover center">Address</h4>
                            <p class="text-white footer-hover center f-s">5th Floor Al Hafeez Heights Gulberg III,
                                Lahore</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3 col-xs-6">
                    <div class="row">
                        <div class="col-md-4 text-center pad-top">
                            <i class="fa fa-envelope footer-info"></i>
                        </div>
                        <div class="col-md-8 pad-top">
                            <h4 class="title text-white center">Email Us</h4>
                            <p class="center"><a href="mailto:meharshakeel9114@gmail.com"
                                    class="text-decoration-none text-white center f-s font-size-13">meharshakeel9114@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3 col-xs-6">
                    <div class="row">
                        <div class="col-md-4 text-center pad-top">
                            <i class="fa fa-phone footer-info"></i>
                        </div>
                        <div class="col-md-8 pad-top">
                            <h4 class="title text-white center">Contact Us</h4>
                            <p class="center"><a href="tel:+92301-4962381"
                                    class="text-white text-decoration-none f-s">+92301-4962381</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3 col-xs-6">
                    <div class="row">
                        <div class="col-md-4 text-center pad-top">
                            <i class="fa fa-clock-o footer-info"></i>
                        </div>
                        <div class="col-md-8 pad-top">
                            <h4 class="title text-white center">Opening Hour</h4>
                            <p class="text-white center f-s">Mon-Friday, 9AM-5PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="text-white">
        <div class="footer-copyright text-center py-3 text-white">© 2021 Copyright:Design By <p class="text-warning">
                Shakeel Ahmad</p>
        </div>
    </div>
</footer>
<a href="https://wa.me/+923019115376?text=I want to contact with you through angvo." target="_blank"><i
        class="fa fa-whatsapp whatsapp text-white"></i></a>

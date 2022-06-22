<meta charset="utf-8">
    <title>Angvo Laravel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel=icon type=image/png sizes=16x16 href={{asset('website/images/small-icon.png')}}>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
        .whatsapp {
            position: fixed;
            right: 2px;
            bottom: 7px;
            font-size: 40px;
            padding: 18px 20px 18px 20px;
            background: #0cff1f;
            border-radius: 80%;
            margin-right: 20px;
            margin-top: -90px;

        }

        .form-button {
            border: none;
            background: #fc5546;
            color: white;
            margin-left: -2px;
        }

        .text-justify {
            text-align: justify;
        }

        .line-height {
            line-height: 25pt;
        }

        .text-color {
            color: white;
        }

        .text-hover:hover {
            color: #fd7e14;
        }

        .card-icon {
            background: #f86e03;
            height: 70px;
            width: 70px;
            text-align: center;
            line-height: 70px;
            border-radius: 50%;
            font-size: 30px;
            color: #fff;
        }

        .header-icon {
            background-color: black;
            border-radius: 100%;
            padding: 10px;
            color: white;
        }

        .header-icon:hover {
            background: white;
            color: #ff5722;
        }

        .footer-icon {
            background-color: #14346b;
            border-radius: 20%;
            padding: 10px;
            color: #4a70b1;
        }

        .footer-icon:hover {
            background: #ff5722;
            color: white;
        }

        .footer-info {
            font-size: 30px;
            background: #14346b;
            padding: 20px 25px 20px 25px;
            color: #4a70b1;
            border-radius: 100%;
        }

        .footer-info:hover {
            background: #ff5722;
            color: white;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open>.dropdown-toggle.btn-primary {
            color: #fff;
            background-color: #00b3db;
            border-color: #285e8e;
            /*set the color you want here*/
        }

        .footer-hover:hover .footer-info {
            background: white;
            color: #f86e03;
        }

        .card-icon:hover {
            background: white;
            color: #f86e03;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open>.dropdown-toggle.btn-primary {
            color: #fff;
            background-color: #00b3db;
            border-color: #285e8e;
            /*set the color you want here*/
        }

        .toggle-btn {
            position: absolute;
            right: 0px;
            top: 16px;
        }

        .mobile-cart-icon {
            display: none;
        }

        .box {
            /*background: white;
            width: 100%;
            height: 300px;
            border-radius: 5%;*/
        }

        .hoverable:hover .card-icon {
            background: white;
            color: #f86e03;
        }

        .hoverable:hover {
            background: #f86e03;
            color: white;
            border: 1px solid #f86e03;
        }

        .font-size-13 {
            font-size: 13px;
        }

        @media (max-width:480px) {
            .icons {
                display: none !important;
            }

            .display-btn {
                display: none;
            }

            .logo-img {
                height: 45px;
            }

            .center {
                text-align: center;
            }

            .pad-top {
                padding-top: 20px;
            }

            .f-s {
                font-size: 19px;
            }

        }

        @media (max-width:768px) {
            .mobile-cart-icon {
                display: block;
                font-size: 36px;
                position: absolute;
                right: 74px;
                top: 7px;
            }
        }
        .about-bg-img {
        background: url("{{asset('website/images/bg-banner.jpg')}}");
        height: 330px;
        width: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.7;
      }
      .services-bg-img {
             background: url("{{asset('website/images/bg-banner.jpg')}}");
    height:330px;
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.7;
        }
         .card-style {
            height: 480px;
        }
        .card-heading {
            min-height: 103px;
            max-height: 103px;
            overflow: hidden;
        }
        .description {
            height: 259px;
            overflow: hidden;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <style type="text/css">
        .testimonial {
            border: 10px solid #662a66;
            padding: 40px 0 25px 0;
            margin: 50px;
            text-align: center;
            position: relative;
        }

        .testimonial:before {
            content: "\f10d";
            font-family: "Font Awesome 5 Free";
            width: 100px;
            height: 100px;
            line-height: 100px;
            background: #fff;
            margin: 0 auto;
            font-size: 70px;
            font-weight: 900;
            color: #f1971f;
            position: absolute;
            top: -60px;
            left: 0;
            right: 0;
        }

        .testimonial .title {
            padding: 7px 0;
            margin: 0 -30px 20px;
            border: 7px solid #fff;
            background: #e8326f;
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
        }

        .testimonial .title:before {
            content: "";
            border-top: 15px solid #662a66;
            border-left: 15px solid transparent;
            border-bottom: 15px solid transparent;
            position: absolute;
            bottom: -37px;
            left: 0;
        }

        .testimonial .title:after {
            content: "";
            border-top: 15px solid #662a66;
            border-right: 15px solid transparent;
            border-bottom: 15px solid transparent;
            position: absolute;
            bottom: -37px;
            right: 0;
        }

        .testimonial .post {
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            text-transform: capitalize;
        }

        .testimonial .description {
            padding: 0 20px;
            margin: 0;
            font-size: 15px;
            color: #6f6f6f;
            letter-spacing: 1px;
            line-height: 30px;
        }

        .owl-theme .owl-controls {
            margin-top: 0;
        }

        .owl-theme .owl-controls .owl-buttons div {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 35px;
            background: #f1971f;
            color: #fff;
            border-radius: 0;
            margin-right: 5px;
            opacity: 1;
        }

        .owl-prev:before,
        .owl-next:before {
            content: "\f060";
            font-family: "Font Awesome 5 Free";
            font-size: 20px;
            font-weight: 900;
        }

        .owl-next:before {
            content: "\f061";
        }

        @media only screen and (max-width: 990px) {
            .testimonial {
                margin: 30px;
            }
        }

        .hight-class {
            height: 310px !important;
        }
    </style>

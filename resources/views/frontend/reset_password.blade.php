<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="Trademart">
    <meta name="title" content="Trademart - Buy and Sell Online">
    <meta name="keywords" content="organic, food, shop, ecommerce, store, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Reset Password || Miscochat Concept</title>
    <link rel="icon" href="assetsuser/images/favicon.png">
    <link rel="stylesheet" href="assetsuser/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assetsuser/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="assetsuser/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="assetsuser/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="assetsuser/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="assetsuser/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="assetsuser/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assetsuser/css/main.css">
    <link rel="stylesheet" href="assetsuser/css/user-auth.css">
</head>

<body>
    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-6">
                    <div class="user-form-logo">
                        <a href="{{ url('/') }}"><img src="assetsuser/images/logo.png" alt="logo"></a>
                    </div>
                    <div class="user-form-card">
                        @include('include.success')
                        @include('include.warning')
                        @include('include.error')
                        <div class="user-form-title">
                            <h2>Password Assistance!</h2>
                            <p style="font-size: 15px;">Please enter your e-mail address associated with your Miscochat account. We will send you a link to this e-mail address to reset your password.</p>
                        </div>
                        <div class="user-form-group">
                            <form method="post" action="{{ route('forget.password.post') }}" class="user-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter your e-mail address">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-button"><button type="submit">Get Reset Password Link</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="user-form-remind">
                        <h5 class="text-center"><a href="{{ url('login') }}">RETURN TO LOGIN</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assetsuser/vendor/bootstrap/jquery-1.12.4.min.js"></script>
    <script src="assetsuser/vendor/bootstrap/popper.min.js"></script>
    <script src="assetsuser/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="assetsuser/vendor/countdown/countdown.min.js"></script>
    <script src="assetsuser/vendor/niceselect/nice-select.min.js"></script>
    <script src="assetsuser/vendor/slickslider/slick.min.js"></script>
    <script src="assetsuser/vendor/venobox/venobox.min.js"></script>
    <script src="assetsuser/js/nice-select.js"></script>
    <script src="assetsuser/js/countdown.js"></script>
    <script src="assetsuser/js/accordion.js"></script>
    <script src="assetsuser/js/venobox.js"></script>
    <script src="assetsuser/js/slick.js"></script>
    <script src="assetsuser/js/main.js"></script>
</body>

</html>
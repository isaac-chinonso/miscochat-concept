<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="Trademart">
    <meta name="title" content="Trademart - Buy and Sell Online">
    <meta name="keywords" content="organic, food, shop, ecommerce, store, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Reset Password Form || Miscochat Concept</title>
    <link rel="icon" href="https://miscochat.ng/assetsuser/images/favicon.png">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/css/main.css">
    <link rel="stylesheet" href="https://miscochat.ng/assetsuser/css/user-auth.css">
</head>

<body>
    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-6">
                    <div class="user-form-logo">
                        <a href="{{ url('/') }}"><img src="https://miscochat.ng/assetsuser/images/logo1.png" alt="logo"></a>
                    </div>
                    <div class="user-form-card">
                        @include('include.success')
                        @include('include.warning')
                        @include('include.error')
                        <div class="user-form-title">
                            <h2>Create New Password</h2>
                        </div>
                        <div class="user-form-group">
                            <form method="post" action="{{ route('reset.password.post') }}" class="m-t-30 m-b-30">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your e-mail address">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Enter new password">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm new password">
                                    @if ($errors->has('confirm_passwordn'))
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>

                                <div class="text-center m-b-15 m-t-30">
                                    <button type="submit" class="btn btn-primary">RESET PASSWORD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="user-form-remind">
                        <h5 class="text-center"><a href="{{ url('/login') }}}">RETURN TO LOGIN</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://miscochat.ng/assetsuser/vendor/bootstrap/jquery-1.12.4.min.js"></script>
    <script src="https://miscochat.ng/assetsuser/vendor/bootstrap/popper.min.js"></script>
    <script src="https://miscochat.ng/assetsuser/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="https://miscochat.ng/assetsuser/vendor/countdown/countdown.min.js"></script>
    <script src="https://miscochat.ng/assetsuser/vendor/niceselect/nice-select.min.js"></script>
    <script src="https://miscochat.ng/assetsuser/vendor/slickslider/slick.min.js"></script>
    <script src="https://miscochat.ng/assetsuser/vendor/venobox/venobox.min.js"></script>
    <script src="https://miscochat.ng/assetsuser/js/nice-select.js"></script>
    <script src="https://miscochat.ng/assetsuser/js/countdown.js"></script>
    <script src="https://miscochat.ng/assetsuser/js/accordion.js"></script>
    <script src="https://miscochat.ng/assetsuser/js/venobox.js"></script>
    <script src="https://miscochat.ng/assetsuser/js/slick.js"></script>
    <script src="https://miscochat.ng/assetsuser/js/main.js"></script>
</body>

</html>
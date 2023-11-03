<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{str_replace('-', ' | ', config('app.name'))}} </title>
    <link rel="icon" href="{{url("image/logo/chl_logo.png")}}">
    <x-auth._header_link/>
</head>
<body class="bg-image" style="background-image: url({{url("image/logo/login_bg_image.jpg")}})">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; <a href="https://github.com/AbuOubaida/" target="_blank">Oubaida</a> {{date('Y')}}</div>
                    <div>
                        <a href="#" class="text-chl">Privacy Policy</a>
                        &middot;
                        <a href="#" class="text-chl">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<x-auth._footer_script/>
<script>

</script>
</body>
</html>

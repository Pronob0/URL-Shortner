<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>{{ $gs->title }}</title>

  <!-- CSS Files  -->
  <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front/css/lightbox.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front/css/odometer.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front/css/owl.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.min.css') }}" />
  

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.png') }}" type="image/x-icon" />

  @stack('css')

</head>

<body>
  <!-- Overlay Loader & ScrollToTop Button -->
  <span class="toTopBtn">
    <i class="fas fa-angle-up"></i>
  </span>
  <div class="overlay"></div>
  <div class="loader"></div>
  <!-- Overlay Loader & ScrollToTop Button -->
<!-- Header -->
<section class="shorted-link-section">
    <div class="shorted-link-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('front.index') }}">
                    <img src="{{ asset('assets/front/images/logo/logo.png') }}" alt="logo">
                </a>
            </div>
            <input type="hidden" value="{{ $gs->ad_timeset }}" id="timeset">
            <input type="hidden" value="{{ $ads->id }}" name="addex" id="addid">
            <div class="header-buttons d-none" id="continue">
                <a href="{{ route('add.redirect',[$ads->id,$link->alias]) }}" class="cmn--btn btn-outline">@lang('Skip Add')</a>
            </div>
            <div id="wait">
                <button class="skip-buttons">@lang('Skip Add In')  <span id="countdown">{{ $gs->ad_timeset }}</span>S</button>
            </div>
        </div>

    </div>
</div>
    
<div class="shorted-link-wrapper">
    <iframe src="{{ $ads->ad_url }}" id="" frameborder="0" ></iframe>
</div>
</section>



<!-- JS Files -->
<script src="{{ asset('assets/front/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/front/js/viewport.jquery.js') }}"></script>
<script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/front/js/odometer.min.js') }}"></script>
<script src="{{ asset('assets/front/js/lightbox.min.js') }}"></script>
<script src="{{ asset('assets/front/js/owl.min.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
<script src="{{ asset('assets/front/js/custom.js') }}" ></script>
<script src="{{ asset('assets/front/js/toastr.min.js') }}"></script>
  {!! Toastr::message() !!}

  
<script>
    $(window).on('load', function () {
        setTimeout(() => {
            $('.shorted-link-wrapper iframe').fadeIn(500)
        }, 500);
    })

    let mainurl = '{{ url('/') }}';
     var loader = {{ $gs->is_loader }};
     var gs      = {!! json_encode(DB::table('generalsettings')->where('id','=',1)->first(['is_cookie'])) !!};


var countdown=$('#timeset').val();
function counter() {
				countdown -= 1;

			    $('#countdown').html(countdown);

				if (countdown <= 0) {
					$('#continue').removeClass('d-none');
					$('#wait').addClass('d-none');
					clearInterval(t);
				}
			}
            $(document).ready(function() {
				t = setInterval("counter()", 1000);
			});





</script>
@stack('js')


</body>

</html>

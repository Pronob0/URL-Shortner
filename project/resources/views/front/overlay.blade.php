

    

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
        <iframe src="{{ $link->url }}" style="width: 100%; height: 700px; position:absolute; z-index:1;"></iframe>


        
     


        <div class="card" style="position: relative;" id="label_text">
            <div class="card-body">
                <h5 class="card-text" style="position: fixed; z-index:99999; min-width:100px;bottom: 10px; right:15px; background-color:aliceblue; padding: 10px 15px; border-radius:10px; cursor:pointer" ><i class="fa fa-question-circle" aria-hidden="true"></i> <span ></span>Hello</h5>
            </div>
        </div> 


        <div class="card" id="form" style="position: relative;">
            <div class="card-body" style="position: fixed; z-index:99999; bottom: 10px; right:15px; min-width:300px ;background-color:aliceblue;  border-radius:10px; padding: 30px 20px">

                <div class="d-flex justify-content-between">
                    <h5 class="card-title " id="form-title">@lang('Email Form')</h5>
                    <span class="h5" id="cross" style="margin-top:-20px; cursor:pointer"><i class="fa fa-times" aria-hidden="true"></i></span>
                </div>
               

                
                <div class="form-group mt-2">
                    <label for="name" class="form-label">@lang('Name')</label>
                    <input type="text" id="name" name="name" class="form-control form--control bg--section"
                        value="" required="" placeholder="{{ __('Jhon Doe') }}">
                </div>
                <div class="form-group mt-2">
                    <label for="demo-email" class="form-label">@lang('Email')</label>
                    <input type="text" id="demo-email" class="form-control form--control bg--section"
                        value="" required="" placeholder="{{ __('Enter Email Here..') }}">
                </div>
                <div class="form-group mt- mb-4">
                    <label for="demo-email" class="form-label">@lang('Message')</label>
                    <textarea class="form-control" name="" id="" ></textarea>
                </div>

                <button class="btn btn-primary" type="button">@lang('Send')</button>
                
            </div>
        </div>
    
    
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
    
      

    @stack('js')

<script>
       $(document).ready(function(){
        $('#form').hide();
        $('#cross').click(function(){
            $('#form').hide();
        })
        $('#label_text').click(function(){
            $('#form').show();
        })
    })

</script>
 
    
    
    </body>
    
    </html>
    


@extends('layouts.user')
@push('css')

@endpush

@section('content')

<!-- User Dashboard -->


    <article class="main--content">
        <div class="dashboard-header position-relative">
    <div class="bg--gradient">&nbsp;</div>
    @includeIf('partials.user.top-nav')
    <div class="breadcrumb-area">
        <h3 class="title text--white">@lang('CTA Message')</h3>
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('user.dashboard') }}">@lang('Dashboard')</a>
            </li>
            <li>
                @lang('CTA Message')
            </li>
        </ul>
    </div>
</div>
        <div class="dashborad--content">
            <div class="dashboard--content-item">
                <div class="row">
                    <div class="col-md-8">
                        <form id="userform" action="{{route('user.store-contact-overlay')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="profile--card">
                  
                        <div class="row gy-4">
                            <div class="col-sm-6 col-xxl-4">
                                <label for="name" class="form-label">@lang('Name')</label>
                                <input type="text" id="name" name="name" class="form-control form--control bg--section"
                                    value="" required="" placeholder="{{ __('Enter Message Overlay Name') }}">
                            </div>
                            <div class="col-sm-6 col-xxl-4">
                                <label for="email" class="form-label">@lang('Logo')</label>
                                <input type="file" name="image" id="myfile" accept="jpg,png,svg" />
                            </div>
                            <div class="col-sm-6 col-xxl-4">
                                <label for="message" class="form-label">@lang('Message')</label>
                                <input  type="text" id="message" class="form-control form--control bg--section"
                                     name="message" required placeholder="Custom Message Here...">
                            </div>

                            <div class="col-sm-6 col-xxl-4">
                                <label for="overlay_label" class="form-label">@lang('Overlay Label')</label>
                                <input type="text" id="overlay_label" placeholder="@lang('Promo')" name="label" class="form-control form--control bg--section" >
                            </div>

                            <div class="col-sm-6 col-xxl-4">
                                <label for="link" class="form-label">@lang('Button Link')</label>
                                <input type="url" id="link" placeholder="@lang('http://urlking.com')" name="link" class="form-control form--control bg--section" >
                            </div>

                            <div class="col-sm-6 col-xxl-4">
                                <label for="btn_text" class="form-label">@lang('Button Link')</label>
                                <input type="text" id="btn_text" placeholder="@lang('Learn More')" name="btn_text" class="form-control form--control bg--section" >
                            </div>

                            <div class="col-sm-12">
                                <div class="text-end">
                                    <button type="submit" class="cmn--btn submit-btn">@lang('Submit')</button>
                                </div>
                            </div>
                            
                            <input type="hidden" value="{{ $slug }}" name="type">
                        </div>
                </div>
            </form>
                    </div>
                    <div class="col-md-4">
                        <div class="card mt-3">
                            <div class="card-body bg-primary text-light position-relative">
                                <div class="tag-label" id="tag_label">Promo</div>

                                <div class="form-group mt-2 d-flex ">
                                    <div class="image-review mb-1 d-none mr-2" >
                                    <img class="h-100 img-fluid ml-4  " src="" alt="" id="show">
                                    </div>
                                    <div class="content">
                                        <p class="mt-1" id="form-title">@lang('Your Question Here? ')</p>
                                        <a class="btn btn-sm mt-1 bg-light mes" href="">Learn More</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center mt-auto">
                &copy; All Right Reserved by <a href="#0" class="text--base">Genius Short</a>
            </div>
        </div>
    </article>

<!-- User Dashboard -->


@endsection

@push('js')
<script>
    "use strict"

     $(document).ready(function () {
        $('#message').on('keyup', function () {
           
            var label = $(this).val();
            $('#form-title').text(label);
        });
    });

    $(document).ready(function () {
        $('#overlay_label').on('keyup', function () {
           
            var label = $(this).val();
            $('#tag_label').text(label);
        });
    });

    $(document).ready(function () {
        $('#btn_text').on('keyup', function () {
           
            var label = $(this).val();
            $('.mes').text(label);
        });
    });

  
    $('#myfile').change(function(){

        $('.image-review').removeClass('d-none');

   var file = event.target.files[0];
   var reader = new FileReader();

   reader.onload = function(e) {
   // The file's text will be printed here
   $("#show").attr('src',e.target.result);

   console.log(e.target.result)
   };

   reader.readAsDataURL(file);

   });
 
</script>

@endpush

@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Edit Users') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.user.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('User Edit') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('User List') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.user.edit',$data->id)}}">{{ __('Edit User') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit User Form') }}</h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="{{ route('admin.user.update',$data->id) }}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}

            <div class="form-group">
                <label>{{ __('Set Picture') }} <small class="small-font">({{ __('Maximum size is 2 MB.') }})</small></label>
                <div class="wrapper-image-preview">
                    <div class="box">
                        <div class="back-preview-image" style="background-image: url({{ $data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.jpg') }});"></div>
                        <div class="upload-options">
                            <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                            <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inp-name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="inp-name" name="name"  placeholder="{{ __('Enter Name') }}" value="{{ $data->name }}" required>
            </div>

            <div class="form-group">
                <label for="inp-email">{{ __('Email') }}</label>
                <input type="text" class="form-control" id="inp-email" name="email"  placeholder="{{ __('Enter Email') }}" value="{{ $data->email }}" disabled="">
            </div>

            <div class="form-group">
                <label for="inp-phone">{{ __('Phone') }}</label>
                <input type="text" class="form-control" id="inp-phone" name="phone"  placeholder="{{ __('Enter Phone') }}" value="{{ $data->phone }}" required>
            </div>

            <div class="form-group">
                <label for="inp-address">{{ __('Address') }}</label>
                <input type="text" class="form-control" id="inp-address" name="address"  placeholder="{{ __('Enter Address') }}" value="{{ $data->address }}" required>
            </div>


            <div class="form-group">
                <label for="inp-fax">{{ __('Fax') }}</label>
                <input type="text" class="form-control" id="inp-fax" name="fax"  placeholder="{{ __('Enter Fax') }}" value="{{ $data->fax }}" >
            </div>

            <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>

        </form>
      </div>
    </div>

    <!-- Form Sizing -->

    <!-- Horizontal Form -->

  </div>

</div>


@endsection




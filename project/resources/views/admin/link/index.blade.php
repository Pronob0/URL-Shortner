@extends('layouts.admin')

@section('content')



    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Link List') }}</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>

            <li class="breadcrumb-item"><a href="{{ route('admin.link.index') }}">{{ __('Link List') }}</a></li>
        </ol>
        </div>
    </div>
    <!-- Row -->
    <div class="row mt-3">
      <!-- Datatables -->
      <div class="col-lg-12">

        @include('includes.admin.form-success')

        <div class="card mb-4">
          <div class="table-responsive p-3">
            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
              <thead class="thead-light">
                <tr>
                    <th>{{ __("Alias") }}</th>
                    <th>{{ __("User") }}</th>
                    <th>{{__('URLs')}}</th>
                    <th>{{ __('Total Click') }}</th>
                    <th>{{ __('Created at') }}</th>
                    <th>{{ __('Plan') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __("Options") }}</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <!-- DataTable with Hover -->

    </div>
    <!--Row-->

{{-- STATUS MODAL --}}

    <div class="modal fade confirm-modal" id="statusModal" tabindex="-1" role="dialog"
        aria-labelledby="statusModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __("Update Status") }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="text-center">{{ __("You are about to change the status.") }}</p>
                <p class="text-center">{{ __("Do you want to proceed?") }}</p>
            </div>
            <div class="modal-footer">
            <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
            <a href="javascript:;" class="btn btn-success btn-ok">{{ __("Update") }}</a>
            </div>
        </div>
        </div>
    </div>

{{-- STATUS MODAL ENDS --}}

{{-- DELETE MODAL --}}

<div class="modal fade confirm-modal" id="deleteModal" tabindex="-1" role="dialog"
aria-labelledby="deleteModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">{{ __("Confirm Delete") }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <p class="text-center">{{__("You are about to delete this Category. Every informtation under this category will be deleted.")}}</p>
        <p class="text-center">{{ __("Do you want to proceed?") }}</p>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
        <a href="javascript:;" class="btn btn-danger btn-ok">{{ __("Delete") }}</a>
    </div>
</div>
</div>
</div>

{{-- DELETE MODAL ENDS --}}

@endsection
@section('scripts')
<script type="text/javascript">
var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               searching: false,
               ajax: '{{ route('admin.link.datatables',2) }}',
               columns: [
                        { data: 'alias', name: 'alias' },
                        { data: 'user_id',searchable: false, orderable: false },
                        { data: 'url'},
                        { data: 'click',name:'click'},
                        { data: 'created_at',searchable: false, orderable: false},
                        { data: 'planid',searchable: false, orderable: false},
                        { data: 'status',searchable: false, orderable: false},
            			{ data: 'action', searchable: false, orderable: false }
                     ],
                language : {

                }
            });
</script>

@endsection


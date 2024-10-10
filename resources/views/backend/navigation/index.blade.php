@extends('backend.layouts.app')
@section('title')
	{{  __('Navigation Manage') }}
@endsection
@section('content')
	
	<div class="py-4">
		<div class="d-flex justify-content-between w-100 flex-wrap">
			<div class="mb-3 mb-lg-0">
				<h1 class="h4">{{  __('Navigation Manager') }}</h1>
			</div>
			<div class="btn-toolbar  mb-md-0 mb-2 ">
				<button type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#new-nav-modal">
					<x-svg i="plus"/>
					{{ __('Add New') }}
				</button>
			</div>
		
		</div>
	</div>
	<div class="card border-0 shadow mb-4">
		<div class="table-responsive">
			<table class="table table-centered table-nowrap mb-0 rounded table-hover align-items-center">
				<thead>
				<tr>
					<th class="border-bottom">{{ __('Name') }}</th>
					<th class="border-bottom">{{ __('Slug') }}</th>
					<th class="border-bottom">{{ __('Display') }}</th>
					<th class="border-bottom">{{ __('Status') }}</th>
					<th class="border-bottom">{{ __('Action') }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($navigations as $navigation)
					<tr>
						<td><span class="fw-bold">{{ _tr($navigation->name) }}</span></td>
						<td><span class="fw-bold">{{ $navigation->slug }}</span></td>
						<td><span class="fw-bold"> {{ $navigation->display }}</span></td>
						<td><span class="fw-bold text-{{ $navigation->is_active ? 'success' : 'danger' }}">{{ $navigation->is_active ? 'Active' : 'Inactive' }}</span></td>
						<td>
								<span data-id="{{ $navigation->id }}" class="edit">
										<x-svg i="edit"/>
								</span>
							
							<span data-id="{{ $navigation->id }}" class="delete">
										<x-svg i="delete"/>
								</span>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			@if($navigations->count() == 0)
				<h4 class="text-center text-muted py-3">{{ __('No Data Available') }}</h4>
			@endif
		</div>
	</div>
	
	<!-- New Nav Modal -->
	@include('backend.navigation.partial._new_nav_modal')
	
	<!-- New Nav Modal -->
	@include('backend.navigation.partial._edit_nav_modal')

@endsection
@section('script')
	<script>
        $(document).ready(function () {

            $(document).on('change', '.is-custom-url', function () {
                'use strict';
                var isChecked = this.checked;
                $('.page-list').prop('hidden', isChecked);
                $('.custom-url-input').prop('hidden', !isChecked);
                $("[name='custom_url']").prop('required', isChecked);
            });

            $('.edit').on('click', function () {
                'use strict';
                var id = $(this).data('id');
                $('#edit-nav-modal').modal('show');

                $.ajax({
                    url: "{{ route('admin.navigation.site.edit',['site' => ':id']) }}".replace(':id', id),
                    type: "GET",
                    data: {id: id},
                    success: function (data) {
                        $('#edit-append').html(data);
                    }
                })
            });

            $('.delete').on('click', function () {
                'use strict';
                let id = $(this).data('id');
                let url = "{{ route('admin.navigation.site.destroy', ['site' => ':id']) }}".replace(':id', id);
                deleteItem(url)
            });
        });
	</script>
@endsection

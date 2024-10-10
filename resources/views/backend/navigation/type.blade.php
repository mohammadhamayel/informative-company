@extends('backend.layouts.app')
@section('title')
	{{  __(ucwords($type).' '.'Navigation') }}
@endsection
@section('content')
	<div class="py-4">
		<div class="d-flex justify-content-between w-100 flex-wrap">
			<div class="mb-3 mb-lg-0">
				<h1 class="h4">{{  __(ucwords($type).' '.'Navigation') }}</h1>
			</div>
			<div class="btn-toolbar  mb-md-0 mb-2 ">
				<a href="{{ route('admin.navigation.site.index') }}" type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
					<x-svg i="clipboard"/>
					{{ __('Navigation Manage') }}
				</a>
			</div>
		</div>
	</div>
	<div class="card border-0 shadow mb-4">
		<div class="table-responsive">
			
			<form method="POST" action="{{ route('admin.navigation.position-update') }}">
				@csrf
				<input type="hidden" name="type" value="{{ $type }}">
				<table class="table table-centered table-nowrap mb-0 rounded">
					<thead>
					<tr>
						<th class="border-0">{{ __('Drag Navigation') }}</th>
						<th class="border-0">{{ __('Name') }}</th>
						<th class="border-0">{{ __('Slug') }}</th> 
						<th class="border-0">{{ __('Status') }}</th>
						<th class="border-0">{{ __('Action') }}</th>
					</tr>
					</thead>
					<tbody id="navigation-drag">
					@foreach($navigations as $navigation)
						<tr class="navigation-item" draggable="true">
							<input type="hidden" name="navigation_ids[]" value="{{ $navigation->id }}">
							<td>
								<x-svg i="uil-drag"/>
							</td>
							<td><span class="fw-bold">{{ _tr($navigation->name) }}</span></td>
							<td><span class="fw-bold">{{ $navigation->slug }}</span></td>
							<td><span class="fw-bold text-{{ $navigation->is_active ? 'success' : 'danger' }}">{{ $navigation->is_active ? 'Active' : 'Inactive' }}</span></td>
							<td>
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
				@else
					<div class="m-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">{{ __('Save Now') }}</button>
					</div>
				@endif
			
			
			</form>
		</div>
	</div>

@endsection
@section('script')
	<script>
        $(document).ready(function () {
            'use strict';

            const navigationDrag = document.getElementById('navigation-drag');
            new Sortable(navigationDrag, {
                animation: 150,
                group: 'shared',
                ghostClass: 'blue-background-class'
            });


        });

        $('.delete').on('click', function () {
            let id = $(this).data('id');
            let position = `{{ $type }}`

            let baseUrl = "{{ route('admin.navigation.position-remove') }}";
            let url = `${baseUrl}?id=${id}&type=${position}`;
            deleteItem(url, 'This navigation will be removed from ' + position + ' list');


        })
	
	</script>
@endsection
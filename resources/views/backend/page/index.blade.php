@extends('backend.layouts.app')
@section('title')
	{{  __('Page Manager') }}
@endsection
@section('content')
	<div class="py-4">
		<div class="d-flex justify-content-between flex-wrap w-100">
			<div class="mb-3 mb-lg-0">
				<h1 class="h4">{{ __('Page Manager') }}</h1>
			</div>
			<div class="btn-toolbar mb-2 me-md-2 d-flex flex-wrap justify-content-end">
				<a href="{{ route('admin.page.site.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center mb-2 mb-md-0 me-2">
					<x-svg i="plus"/>
					{{ __('Create Page') }}
				</a>
				<a href="{{ route('admin.page.error404') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center mb-2 mb-md-0">
					<x-svg i="error"/>
					{{ __('404 Error Page Manage') }}
				</a>
			</div>
		</div>
	</div>


	<div class="card border-0 shadow mb-4">
		<div class="table-responsive">
			<table class="table user-table table-hover align-items-center">
				<thead>
				<tr>
					<th class="border-bottom">{{ __('Title') }}</th>
					<th class="border-bottom">{{ __('Slug') }}</th>
					<th class="border-bottom">{{ __('Component') }}</th>
					<th class="border-bottom">{{ __('Status') }}</th>
					<th class="border-bottom">{{ __('Action') }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($pages as $page)
					<tr>
						<td><span class="fw-bold">{{ $page->title }}</span></td>
						<td><span class="fw-bold">@if($page->slug != '/')/@endif{{ $page->slug }}</span></td>
						<td><span class="fw-bold"> {{ count(json_decode($page->component_id,true)) ?? 0 }}</span></td>
						<td><span class="fw-bold text-{{ $page->is_active ? 'success' : 'danger' }}">{{ $page->is_active ? 'Active' : 'Inactive' }}</span></td>
						<td>
							<a href="{{ route('admin.page.site.edit', $page->id) }}">
								<x-svg i="edit"/>
							</a>
							@if($page->slug != '/')
								<span data-id="{{ $page->id }}" class="delete">
										<x-svg i="delete"/>
									</span>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
@section('script')
	
	<script>
        $(document).ready(function () {
            'use strict';

            $('.delete').on('click', function (event) {
                let id = $(this).data('id');
                let url = '{{ route("admin.page.site.destroy", ["site" => ":id"]) }}'.replace(':id', id)
                deleteItem(url)
            })
        });
	</script>
@endsection
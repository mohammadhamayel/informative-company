@extends('backend.layouts.app')
@section('title')
	{{ __('Plugin Manage') }}
@endsection
@section('content')
	<div class="py-4">
		<div class="d-flex justify-content-between w-100 flex-wrap">
			<div class="mb-3 mb-lg-0">
				<h1 class="h4">{{ __('Plugin Manage') }}</h1>
			</div>
		</div>
	</div>
	<div class="card border-0 shadow mb-4">
		<div class="col-12 col-lg-12">
			<div class="card border-0 shadow">
				<div class="table-responsive">
					
					<table class="table table-centered table-nowrap mb-0 rounded hover">
						<thead>
						<tr>
							<th class="border-0">{{ __('Logo') }}</th>
							<th class="border-0">{{ __('Name') }}</th>
							<th class="border-0">{{ __('Description') }}</th>
							<th class="border-0">{{ __('Status') }}</th>
							<th class="border-0">{{ __('Manage') }}</th>
						</tr>
						</thead>
						<tbody>
						@foreach($plugins as $plugin)
							<tr>
								<td><img class="image-xs" src="{{ asset($plugin->logo) }}" alt=""></td>
								<td><span class="fw-bold">{{ $plugin->name }}</span></td>
								<td><span class="fw-bold">{{ $plugin->description }}</span></td>
								<td><span class="fw-bold text-{{ $plugin->status ? 'success' : 'danger' }}">{{ $plugin->status ? 'Active' : 'Inactive' }}</span></td>
								<td>
									<span title="Manage Plugin" data-id="{{ $plugin->id }}" class="mange-plugin cursor">
											<x-svg i="settings"/>
									</span>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				
				</div>
			</div>
		</div>
	</div>
	
	@include('backend.plugin.partial._edit_plugin_modal')

@endsection
@section('script')
	<script>
        $('.mange-plugin').on('click', function () {
            'use strict';
            var id = $(this).data('id');
            $('#edit-plugin-modal').modal('show');

            $.ajax({
                url: "{{ route('admin.plugin.edit',['plugin' => ':id']) }}".replace(':id', id),
                type: "GET",
                data: {id: id},
                success: function (data) {
                    $('#edit-plugin-form').attr('action', '{{ route('admin.plugin.update', ['plugin' => ':id']) }}'.replace(':id', id));
                    $('#edit-append').html(data);
                }
            })
        });
	</script>
@endsection

@extends('backend.layouts.app')
@section('title', __('Languages'))
@section('content')
	<div class="py-4">
		<div class="d-flex justify-content-between w-100 flex-wrap">
			<div class="mb-3 mb-lg-0">
				<h1 class="h4">{{  __('Languages Manage') }}</h1>
			</div>
			<div class="btn-toolbar  mb-md-0 mb-2 ">
				<a  href="{{ route('admin.language.sync-missing-keys') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2">
					<x-svg i="sync"/>
					{{ __('Sync Missing Translation') }}
				</a>
				<button type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#new-lang-modal">
					<x-svg i="plus"/>
					{{ __('Add New') }}
				</button>
			</div>
		
		</div>
	</div>
	<div class="card border-0 shadow mb-4">
		
		<div class="table-responsive">
			<table class="table user-table table-hover align-items-center">
				<thead >
				<tr>
					<th>{{ __('Name') }}</th>
					<th>{{ __('Code') }}</th>
					<th>{{ __('Default') }}</th>
					<th>{{ __('Rtl') }}</th>
					<th>{{ __('Status') }}</th>
					<th>{{ __('Action') }}</th>
				</tr>
				</thead>
				<tbody>
				@forelse($languages as $language)
					<tr>
						<td>{{ $language->name }}</td>
						<td>{{ $language->code }}</td>
						<td> <span class="fw-bold text-{{ $language->is_default ? 'success' : 'danger' }}">{{ $language->is_default ? 'Yes' : 'No' }}</span></td>
						<td><span class="fw-bold text-{{ $language->is_rtl ? 'success' : 'danger' }}">{{ $language->is_rtl ? 'Yes' : 'No' }}</span></td>
						<td><span class="fw-bold text-{{ $language->status ? 'success' : 'danger' }}">{{ $language->status ? 'Active' : 'Inactive' }}</span></td>
						<td>
							
							<a href="{{ route('admin.language.translate', $language->code) }}"> <x-svg i="language"/></a>
							<span data-id="{{ $language->id }}" class="edit">
									<x-svg i="edit"/>
							</span>
							@if($language->code != 'en')
								<span data-id="{{ $language->id }}" class="delete">
										<x-svg i="delete"/>
								</span>
							@endif
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="6" class="text-center">{{ __('No Data Available') }}</td>
					</tr>
				@endforelse
				</tbody>
			</table>
		</div>
	</div>
	
	<!-- New Lang Modal -->
	@include('backend.languages.partial._new_lang_modal')
	
	<!-- Edit Lang Modal -->
	@include('backend.languages.partial._edit_lang_modal')
@endsection
@section('script')
	<script>
        $(document).ready(function () {

           

            $('.edit').on('click', function () {
                'use strict';
                var id = $(this).data('id');
                $('#edit-lang-modal').modal('show');

                $.ajax({
                    url: "{{ route('admin.language.edit',['language' => ':id']) }}".replace(':id', id),
                    type: "GET",
                    data: {id: id},
                    success: function (data) {
                        $('#edit-lang-form').attr('action', '{{ route('admin.language.update', ['language' => ':id']) }}'.replace(':id', id));
                        $('#edit-lang-append').html(data);
                    }
                })
            });

            $('.delete').on('click', function () {
                'use strict';
                let id = $(this).data('id');
                let url = "{{ route('admin.language.destroy', ['language' => ':id']) }}".replace(':id', id);
                deleteItem(url)
            });
        });
	</script>
@endsection
@extends('backend.layouts.app')
@section('title')
	{{ __('Settings') }}
@endsection
@section('content')
	<div class="py-4">
		<div class="d-flex justify-content-between w-100 flex-wrap">
			<div class="mb-3 mb-lg-0">
				<h1 class="h4">{{  __('Settings') }}</h1>
			</div>
			<div class="btn-toolbar  mb-md-0 mb-2  mx-1">
				<a href="{{ route('admin.social.index') }}" type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
					<x-svg i="share"/>
					{{ __('Social Links') }}
				</a>
				<a href="{{ route('admin.page.component.edit',17) }}" type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center mx-1">
					<x-svg i="identification"/>
					{{ __('Contact Info') }}
				</a>
			</div>
		
		</div>
	</div>
	<div class="row">
		@foreach(config('setting_fields') as $section => $fields)
			@if($fields['setting_page'])
				<div class="col-12 col-xl-6">
					@include('backend.settings.partial._setting', ['section' => $section, 'fields' => $fields])
				</div>
			@endif
		@endforeach
	</div>




@endsection
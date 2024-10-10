@extends('backend.layouts.app')
@section('title')
	{{ __('Profile Manage') }}
@endsection
@section('content')
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div>
			<h2 class="h2 mb-0">{{ __('Profile Setting') }}</h2>
		</div>
	</div>
	
	<div class="row">
		@include('backend.profile.partials._profile_edit')
		
		@include('backend.profile.partials._two_fa')
	</div>
	<div class="row">
		@include('backend.profile.partials._change_password')
	</div>

@endsection

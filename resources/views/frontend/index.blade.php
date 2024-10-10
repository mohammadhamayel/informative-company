@extends('frontend.layouts.app')
@section('title')
	{{ __('Home') }}
@endsection
@section('content')
	@foreach($components as $data)
	@if($data->section == 'about')
		@break
	@endif
		@includeIf('frontend.page.component._'.$data->section)
	@endforeach
@endsection



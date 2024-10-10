@php($seo = config('setting_fields.seo'))
@extends('backend.layouts.app')
@section('title')
	{{ __('SEO Settings') }}
@endsection
@section('content')
	<div class="py-4">
		<div class="d-flex justify-content-between w-100 flex-wrap">
			<div class="mb-3 mb-lg-0">
				<h1 class="h4">{{  __('SEO Settings') }}</h1>
			</div>
		
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-xl-12">
			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">{{ __($seo['title']) }}</h2>
				<form method="POST" action="{{ route('admin.seo.update') }}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="section" value="seo">
					<div class="row">
						@foreach($seo['elements'] as $key => $field)
							@includeIf('backend.settings.fields.'.$field['type'], ['field' => $field,'class' => $field['class']])
						@endforeach
					</div>
					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">{{ __('Update SEO Settings') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection
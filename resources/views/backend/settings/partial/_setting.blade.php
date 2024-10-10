<div class="card card-body border-0 shadow mb-4">
	<div class="d-flex justify-content-between w-100 flex-wrap mb-3">
		<div class="mb-md-0">
			<h2 class="h5 @if(!isset($fields['info'])) mb-md-0 @endif">{{ __($fields['title']) }}</h2>
			@isset($fields['info'])
				<p class="small text-muted mb-4"><i class="mx-1 {{ $fields['info_icon'] }}"></i> {{ __($fields['info']) }}</p>
			@endisset
		</div>
		@isset($fields['option'])
			<div class="btn-toolbar mb-md-0">
				@include('backend.settings.partial.options.'.$fields['option'])
			</div>
		@endisset
	</div>

	<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="section" value="{{ $section }}">
		<div class="row">
			@foreach($fields['elements'] as $key => $field)
				@includeIf('backend.settings.fields.'.$field['type'], ['field' => $field,'class' => $field['class']])
			@endforeach
		</div>
		<div class="mt-3">
			<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">{{ __('Update Now') }}</button>
		</div>
	</form>
</div>
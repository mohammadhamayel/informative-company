<div class="{{ $class }} mb-3">
	<div class="form-group">
		<label for="email">{{ __($field['label']) }}</label>
		@isset($field['message'])
			<i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $field['message'] }}" class="mx-1 fa-solid fa-circle-info text-muted"></i>
		@endisset
		<div class="form-check form-switch {{ $class }}">
			<input type="hidden" name="{{ $field['key'] }}" value="0">
			<input class="form-check-input coevs-switch" type="checkbox" id="{{ $field['key'] }}" name="{{ $field['key'] }}" value="1" @checked(setting($field['key'],$field['value'])) height="3">
			<label class="form-check-label" for="{{ $field['key'] }}"></label>
		</div>
	</div>
</div>

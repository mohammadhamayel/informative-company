<div class="{{ $class }} mb-3">
	<div class="form-group">
		<label for="{{ $field['key'] }}">{{ __($field['label']) }}</label>
		@isset($field['message'])
			<i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $field['message'] }}" class="mx-1 fa-solid fa-circle-info text-muted"></i>
		@endisset
		<input class="form-control" name="{{ $field['key'] }}"  id="{{ $field['key'] }}" type="text" value="{{ setting($field['key'],$field['value']) }}" >
	</div>
</div>
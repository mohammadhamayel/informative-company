<div class="{{ $class }} mb-3">
	<div class="form-group">
		<label for="{{ $field['key'] }}">{{ __($field['label']) }}</label>
		@isset($field['message'])
			<i data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $field['message'] }}" class="mx-1 fa-solid fa-circle-info text-muted"></i>
		@endisset
		<select class="form-select" name="{{ $field['key'] }}" aria-label="Default">
			@foreach($field['value'] as  $value)
				<option @selected(setting($field['key'],$field['value']) == $value) value="{{ $value }}">{{ Str::upper(str_replace('_',' ', $value ?? ''))  }}</option>
			@endforeach
		</select>
	</div>
</div>
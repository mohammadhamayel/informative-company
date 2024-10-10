<div class="{{ $class }} mb-3">
	<div class="form-group">
		<label for="email">{{ __($field['label']) }}</label>
		<textarea class="form-control" name="{{ $field['key'] }}"  rows="3">{{ setting($field['key'],$field['value']) }}</textarea>
	</div>
</div>
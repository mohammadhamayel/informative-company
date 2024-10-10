<div class="{{ $class }} mb-3">
	<div class="form-group">
		<label for="email">{{ __($field['label']) }}</label>
		<input class="form-control tags-evs" name="{{ $field['key'] }}"  id="email" type="text" value="{{ setting($field['key'],$field['value']) }}">
	</div>
</div>
<div class="{{ $class }} mb-3">
	<div class="form-group">
		<label for="phone">{{ __($field['label']) }}</label>
		<x-img-up name="{{ $field['key'] }}" :old="setting($field['key'],$field['value']) ?? demoImage()"/>
	</div>
</div>

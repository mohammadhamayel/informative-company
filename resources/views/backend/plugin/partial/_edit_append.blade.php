<div class="row">
	@foreach($credentials as $field_name => $credential)
		<div class="col-md-12 mb-3">
			<div>
				<label for="{{$field_name}}">{{ ucwords(str_replace('_', ' ', $field_name)) }}</label>
				<input class="form-control" name="credentials[{{ $field_name }}]" {{ $field_name }}" id="{{$field_name}}" value="{{ $credential }}"  type="text" placeholder="Enter {{ $field_name }}" >
			</div>
		</div>
	@endforeach
		
		<div class="col-md-6 mb-3 mt-2">
			<div>
				<div class="form-check form-switch">
					<label class="form-check-label" for="status">{{ __('Plugin Status') }}</label>
					<input class="form-check-input" type="checkbox" value="1" @checked($status) name="status"  id="status">
				</div>
			</div>
		</div>
	
</div>
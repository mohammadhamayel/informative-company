@foreach($plugins as $pluginCode => $plugin)
	@if($plugin['status'] == \App\Constants\Status::TRUE)
		@includeWhen($pluginCode == 'fb', 'frontend.partial.plugin._fb')
		@includeWhen($pluginCode == 'tawk', 'frontend.partial.plugin._tawk')
		@includeWhen($pluginCode == 'google-analytics', 'frontend.partial.plugin._google_analytics')
	@endif
@endforeach

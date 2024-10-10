<button type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#smtp-check-modal">
	<x-svg i="mail-check"/>
	{{ __('Smtp Connection Check') }}
</button>

<div class="modal fade" id="smtp-check-modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="h6 modal-title">{{ __('Smtp Connection Check') }}</h2>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12 col-xl-12">
						<form method="get" action="{{ route('admin.smtp-connection-check') }}" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-12 mb-3">
									<div>
										<label for="email">{{ __('Email Address ') }}</label>
										<input class="form-control" name="email" id="email"  type="email" placeholder="Enter Your Email" required>
									</div>
								</div>
							</div>
							<div class="mt-3">
								<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">{{ __('Check Now') }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</div>

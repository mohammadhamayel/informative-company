<div class="col-12 col-xl-6">
	<div class="card card-body border-0 shadow mb-4">
		<h2 class="h5 mb-4">{{ __('Profile information Edit') }}</h2>
		<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				
				<div class="col-md-6 mb-3">
					<div class="form-group">
						<label for="phone">{{ __('Avatar') }}</label>
						<x-img-up name="avatar" :old="auth()->user()->avatar"/>
					</div>
				</div>
			
			
			</div>
			<div class="row">
				<div class="col-md-6 mb-3">
					<div>
						<label for="first_name">{{ __('First Name') }}</label>
						<input class="form-control" name="first_name" value="{{ auth()->user()->first_name }}" id="first_name" type="text" placeholder="Enter your first name" required>
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<div>
						<label for="last_name">{{ __('Last Name') }}</label>
						<input class="form-control" name="last_name" value="{{ auth()->user()->last_name }}" id="last_name" type="text" placeholder="Also your last name" required>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 mb-3">
					<div class="form-group">
						<label for="email">{{ __('Email') }}</label>
						<input class="form-control" name="email" value="{{ auth()->user()->email }}" id="email" type="email" placeholder="name@company.com" required>
					</div>
				</div>
			</div>
			
			<div class="mt-3">
				<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">{{ __('Update Profile') }}</button>
			</div>
		</form>
	</div>
</div>
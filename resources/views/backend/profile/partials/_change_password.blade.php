<div class="col-12 col-xl-6">
	<div class="card card-body border-0 shadow mb-4">
		<h2 class="h5 mb-4">{{ __('Password Change') }}</h2>
		<form method="POST" action="{{ route('admin.profile.password-update') }}">
			@csrf
			<div class="row">
				<div class="col-md-6 mb-3">
					<div>
						<label for="first_name">{{ __('New Password') }}</label>
						<input class="form-control" name="new_password" type="password" placeholder="Enter New Password" required>
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<div>
						<label for="last_name">{{ __('Confirm Password') }}</label>
						<input class="form-control" name="confirm_password" type="password" placeholder="Enter Confirm Password" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mb-3">
					<label for="last_name">{{ __('Old Password') }}</label>
					<input class="form-control" name="old_password" type="password" placeholder="Enter Old Password" required>
				</div>
			</div>
			<div class="mt-3">
				<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">{{ __('Update Password') }}</button>
			</div>
		</form>
	</div>
</div>
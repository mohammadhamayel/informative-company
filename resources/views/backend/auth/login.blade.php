@extends('backend.auth.index')
@section('title')
	{{ __('Login') }}
@endsection
@section('auth_form')
	<form method="POST" action="{{ route('login') }}" class="mt-4">
		@csrf
		<div class="form-group mb-4">
			<label for="email">{{ __('Your Email') }}</label>
			<div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <x-svg i="mail"/>
                                        </span>
				<input type="email" name="email"  class="form-control" placeholder="Email" id="email" autofocus required>
			</div>
		</div>
		<div class="form-group">
			<div class="form-group mb-4">
				<label for="password">{{ __('Your Password') }}</label>
				<div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <x-svg i="lock"/>
                                            </span>
					<input type="password" placeholder="Password" name="password"  class="form-control" id="password" required>
				</div>
			</div>
			<div class="d-flex justify-content-between align-items-top mb-4">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="remember" id="remember">
					<label class="form-check-label mb-0" for="remember">
						{{ __('Remember me') }}
					</label>
				</div>
				<div><a href="{{ route('password.request') }}" class="small text-right">{{ __('Lost password?') }}</a></div>
			</div>
		</div>
		
		@if(config('services.recaptcha.status'))
			<div class="g-recaptcha mt-4 mb-4" data-sitekey={{config('services.recaptcha.key')}}></div>
		@endif

		<div class="d-grid">
			<button type="submit" class="btn btn-gray-800">{{ __('Sign in') }}</button>
		</div>
	</form>
@endsection
@push('script')
	<script async src="https://www.google.com/recaptcha/api.js"></script>
@endpush

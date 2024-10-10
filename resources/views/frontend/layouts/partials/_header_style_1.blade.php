<!-- Mouse cursor area start here -->
@include('frontend.layouts.partials._cursor')
<!-- Mouse cursor area end here -->

<!-- Header area start here -->
<header class="header-area header-two-area">
	<div class="container header__container">
		<div class="header__main">
			<a href="{{ route('home') }}" class="logo">
				<img src="{{ asset(setting('light_logo')) }}" alt="logo">
			</a>
			<div class="main-menu">
				<nav>
					<ul>
						@foreach($navigations as $navigation)
							<li><a href="{{ $navigation->slug == '/' ? route('home') : $navigation->slug }}" target="{{ $navigation->target }}">{{ _tr($navigation->name) }}</a></li>
						@endforeach
					</ul>
				</nav>
			</div>
			<div class="d-none d-xl-flex gap-4">

					<a href="{{ setting('get_quote_link') }}" class="btn-one">{{ __('Get A Quote') }} <i class="fa-regular fa-arrow-right-long"></i></a>
				
					<div class="about-three__left-item d-flex flex-wrap gap-2 align-items-center">
						<div class="about-call-icon">
							<span><x-svg i="call"/></span>
						</div>
						<div class="info">
							<span class="sm-font fw-600 text-white">{{ __('Call Us') }}</span>
							<h5 class="text-white">{{ trim(explode(',', $contactInfo->content->contact_number->value)[0]) }}</h5>
						</div>
					</div>
				
				


			</div>
			@if(setting('language_visibility'))
				<div class="about-three__left-item d-flex flex-wrap gap-2 align-items-center light-area d-none d-lg-block">
					<select name="locale" class="light-area"   onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
						@foreach($languages as $language)
							<option class="light-area" value="{{ route('locale-set', $language->code) }}" @selected($language->code == app()->getLocale())>{{ $language->name }}</option>
						@endforeach
					</select>
				</div>
			@endif
			<div class="bars d-block d-lg-none">
				<i id="openButton" class="fa-solid fa-bars"></i>
			</div>
		</div>
	</div>
</header>
<!-- Header area end here -->
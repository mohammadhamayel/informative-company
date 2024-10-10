<script src="{{ asset('general/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('general/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/meanmenu.js') }}"></script>
<script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script  src="{{ asset('frontend/js/pace.min.js') }}"></script>
<script src="{{ asset('frontend/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.js') }}"></script>
@include('frontend.partial._helper')
<script src="{{ asset('frontend/js/script.js?v2.01') }}"></script>
<script src="{{ asset('general/js/simple-notify.min.js?v2.01') }}"></script>
<script src="{{ asset('general/js/helpers.js?v2.01') }}"></script>
@yield('script')
{{--Custom Script--}}
@php($script = \App\Models\SiteCustom::value('script'))
@if($script->is_active)
	<script>
		{{ $script->value }}
	</script>
@endif
@include('frontend.partial.plugin._index')
@include('general._notify_evs')

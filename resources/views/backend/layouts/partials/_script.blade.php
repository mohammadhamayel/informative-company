<script src="{{ asset('general/js/popper.min.js') }}"></script>
<script src="{{ asset('general/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('general/js/jquery-3.7.1.min.js') }}"></script>

<script src="{{ asset('backend/js/summernote-lite.min.js') }}"></script>

<script src="{{ asset('general/js/smooth-scroll.polyfills.min.js') }}"></script>
<script src="{{ asset('backend/js/chartist.min.js') }}"></script>
<script src="{{ asset('general/js/datepicker.min.js') }}"></script>
<script src="{{ asset('backend/js/tagify.min.js') }}"></script>
<script src="{{ asset('general/js/simple-notify.min.js') }}"></script>
<script src="{{ asset('general/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('backend/js/sortable.js') }}"></script>
<script src="{{ asset('backend/js/app.js') }}"></script>
<script src="{{ asset('backend/js/custom.js') }}"></script>
<script src="{{ asset('general/js/helpers.js') }}"></script>

@stack('script')
@yield('script')
@include('general._notify_evs')
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') - {{ setting('site_title')  }}</title>
	<link rel="shortcut icon" href="{{ asset(setting('site_favicon')) }}" type="image/x-icon"/>
	<link type="text/css" href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
	<link type="text/css" href="{{ asset('general/css/all.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('backend/css/summernote-lite.min.css') }}" >
	<link rel="stylesheet" href="{{ asset('backend/css/tagify.css') }}"  type="text/css" />
	<link rel="stylesheet" href="{{ asset('general/css/simple-notify.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('general/css/sweetalert2.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}" />
	@stack('style')
	@yield('style')
</head>
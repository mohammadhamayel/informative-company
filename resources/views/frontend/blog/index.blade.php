@extends('frontend.page.index')
@section('page_content')
	<section class="blog-single-area pt-120 pb-120">
		<div class="container">
			<div class="row g-4">
				
				<!--Dynamic Blog Content-->
				@yield('blog_content')
				
				@include('frontend.blog.partial._side_bar')
			</div>
		</div>
	</section>
@endsection
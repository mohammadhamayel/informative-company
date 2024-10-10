<section class="pricing-area pt-120 pb-120">
	<div class="pricing__shape-up wow slideInLeft d-none d-sm-block" data-wow-delay="00ms"
	     data-wow-duration="1500ms">
		<img class="sway_Y__animationY" src="{{ asset($data->content->shape_up->value) }}" alt="image">
	</div>
	<div class="pricing__shape-down wow slideInLeft d-none d-sm-block" data-wow-delay="200ms"
	     data-wow-duration="1500ms">
		<img class="sway_Y__animation" src="{{ asset($data->content->shape_down->value) }}" alt="image">
	</div>
	<div class="pricing__shape">
		<img class="sway_Y__animationY" src="{{ asset($data->content->shape->value) }}" alt="image">
	</div>
	<div class="container">
		<div class="section-header text-center mb-60">
			<h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
				<img class="me-1" src="{{ asset($data->content->title_icon->value) }}" alt="icon">
				{{ $data->content->heading->value }}
			</h5>
			<h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
				{{ $data->content->sub_heading->value }}
			</h2>
		</div>
		<div class="row g-4">
			@foreach($data->items as $item)
				@php($content = $item->content)
			<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{$loop->index}}00ms"
			     data-wow-duration="1500ms">
				<div class="pricing__item">
					<div class="item-shape">
						<img src="{{ asset($content->plan_shape->value) }}" alt="shape">
					</div>
					<div class="pricing-head">
						<div>
							<h4 class="text-white mb-10">{{ $content->name->value }}</h4>
							<h2>{{ $content->price->value }}<span>/{{ ucfirst($content->duration->value) }}</span></h2>
						</div>
						<div class="pricing-icon" data-background="{{ asset('general/static/pricing-icon-bg.png') }}">
							<img src="{{ asset($content->plan_icon->value) }}" alt="icon">
						</div>
					</div>
					<ul>
						<li>{{ $content->feature_1->value }}</li>
						<li>{{ $content->feature_2->value }}</li>
						<li>{{ $content->feature_3->value }}</li>
						<li>{{ $content->feature_4->value }}</li>
						<li>{{ $content->feature_5->value }}</li>
					</ul>
					<a href="{{ $content->button_link->value }}" class="btn-one d-block text-center">{{ $content->button_name->value }} <i
							class="fa-regular fa-arrow-right-long"></i></a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
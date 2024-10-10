@php($content = $data->content)
<section class="service-area pt-120 pb-120">
	<div class="service__shape wow slideInRight">
		<img class="sway_Y__animation" src="{{ asset($content->shape->value) }}" alt="shape">
	</div>
	<div class="container">
		<div class="d-flex flex-wrap gap-4 align-items-center justify-content-between mb-60">
			<div class="section-header">
				<h5 class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
					<img class="me-1" src="{{ asset($content->title_icon->value) }}" alt="icon">
					{{ $content->sub_heading->value }}
				</h5>
				<h2 class="wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms"> {{ $content->heading->value }}</h2>
			</div>
			<a href="{{ $content->button_link->value }}" class="btn-one wow fadeInUp" data-wow-delay="200ms"
			   data-wow-duration="1500ms">{{ $content->button_title->value }} <i class="fa-regular fa-arrow-right-long"></i></a>
		</div>
		<div class="row g-4">
			@foreach($data->items->take($content->limit_list->value) as $content)
				@php($item = $content->content)
			
				<div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="00ms" data-wow-duration="1000ms">
				<div class="service__item">
					<div class="service-shape">
						<img src="{{ asset($item->shape_for_grid->value) }}" alt="shape">
					</div>
					<div class="service__icon">
						<img src="{{ asset($item->light_icon->value) }}" alt="icon">
					</div>
					<h4><a href="{{ route('content.details', ['section' => $data->section, 'id' => $content->id]) }}">{{ $item->heading->value }}</a></h4>
					<p>{{ \Str::limit($item->summary->value, 80) }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
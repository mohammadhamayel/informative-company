<section class="service-three-area pt-120 pb-120 light-area">
	<div class="service-three__shape">
		<img class="sway__animationX" src="{{ asset($data->content->shape->value) }}" alt="shape">
	</div>
	<div class="container">
		<div class="section-header text-center mb-60">
			<h5 class="wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
				<img class="me-1" src="{{ asset($data->content->title_icon->value) }}" alt="icon">
				{{ $data->content->sub_heading->value }}
			</h5>
			<h2 class="wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">{{ $data->content->heading->value }}</h2>
		</div>
		
		<div class="row g-4">
			@foreach($data->items->take($data->content->limit_list->value) as $item)
				@php($content = $item->content)
				<div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
					<div class="service-three__item">
						<div class="service-three__image image">
							<img class="component-service-cover" src="{{ asset($content->service_cover->value) }}" alt="image">
						</div>
						<div class="service-three__content">
							<div class="icon">
								<img src="{{ asset($content->light_icon->value) }}" alt="icon">
							</div>
							<h4>{{ $content->heading->value }}</h4>
						</div>
						<div class="service-three__up-content text-center">
							<div class="icon">
								<img src="{{ asset($content->dark_icon->value) }}" alt="icon">
							</div>
							<h4><a href="{{ route('content.details', ['section' => $data->section, 'id' => $item->id]) }}" class="text-white mt-25 mb-15">{{ $content->heading->value }}</a>
							</h4>
							<p class="text-white">{{ \Str::limit($content->summary->value, $data->content->limit_summary->value) }}</p>
							<a class="mt-20 read-more-btn text-white" href="{{ route('content.details', ['section' => $data->section, 'id' => $item->id]) }}">{{ $content->button_title->value }} <i
									class="fa-regular fa-arrow-right-long text-white"></i></a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
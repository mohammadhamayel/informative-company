
<section class="service-inner-area pt-120 pb-120">
	<div class="container">
		<div class="row g-4">
			@foreach($data->items as $content)
			@php($item = $content->content)
			<div class="col-lg-4 col-md-6">
				<div class="service-two__item">
					<div class="image">
						<img class="component-blog-cover" src="{{ asset($item->service_cover->value) }}" alt="image">
					</div>
					<div class="service-two__content">
						<div class="icon">
							<img src="{{ asset($item->dark_icon->value) }}" alt="icon">
						</div>
						<div class="shape"><img src="{{ asset($item->shape_for_grid->value) }}"
						                        alt="shape"></div>
						<h4><a href="{{ route('content.details', ['section' => $data->section, 'id' => $content->id]) }}" class="primary-hover">{{ $item->heading->value }}</a></h4>
						<p>{{ \Str::limit($item->summary->value, 80) }}</p>
						<a class="read-more-btn" href="{{ route('content.details', ['section' => $data->section, 'id' => $content->id]) }}">{{ $item->button_title->value }} <i class="fa-regular fa-arrow-right-long"></i></a>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</section>
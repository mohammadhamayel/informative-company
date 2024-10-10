@php($content = $data->content)
<section class="service-two-area secondary-bg pt-120 pb-120">
	<div class="service-two__shape-left sway_Y__animationY">
		<img src="{{ asset($content->shape_left->value) }}" alt="shape">
	</div>
	<div class="service-two__shape-right sway_Y__animation">
		<img src="{{ asset($content->shape_right->value) }}" alt="shape">
	</div>
	<div class="container">
		<div class="d-flex gap-4 flex-wrap align-items-center justify-content-between mb-60">
			<div class="section-header">
				<h5 class="wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
					<svg class="me-1" width="20" height="12" viewBox="0 0 20 12" fill="none"
					     xmlns="http://www.w3.org/2000/svg">
						<rect x="0.75" y="0.750061" width="18.5" height="10.5" rx="5.25" stroke="#3C72FC"
						      stroke-width="1.5"/>
						<mask id="path-2-inside-1_670_477" fill="white">
							<path
								d="M3 6.00006C3 3.79092 4.79086 2.00006 7 2.00006H13C15.2091 2.00006 17 3.79092 17 6.00006C17 8.2092 15.2091 10.0001 13 10.0001H7C4.79086 10.0001 3 8.2092 3 6.00006Z"/>
						</mask>
						<path
							d="M3 6.00006C3 2.96249 5.46243 0.500061 8.5 0.500061H11.5C14.5376 0.500061 17 2.96249 17 6.00006C17 4.61935 15.2091 3.50006 13 3.50006H7C4.79086 3.50006 3 4.61935 3 6.00006ZM17 6.00006C17 9.03763 14.5376 11.5001 11.5 11.5001H8.5C5.46243 11.5001 3 9.03763 3 6.00006C3 7.38077 4.79086 8.50006 7 8.50006H13C15.2091 8.50006 17 7.38077 17 6.00006ZM3 10.0001V2.00006V10.0001ZM17 2.00006V10.0001V2.00006Z"
							fill="#3C72FC" mask="url(#path-2-inside-1_670_477)"/>
					</svg>
					
					{{ $content->sub_heading->value }}
				</h5>
				<h2 class="text-white wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
					{{ $content->heading->value }} </h2>
			</div>
			<div class="arry-btn  d-flex gap-3 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
				<button class="arry-prev service__arry-prev"><i class="fa-light fa-chevron-left"></i></button>
				<button class="arry-next service__arry-next active"><i
						class="fa-light fa-chevron-right"></i></button>
			</div>
		</div>
			<div class="swiper service-two__slider">
				<div class="swiper-wrapper">
					
					@foreach($data->items as $item)
					
						@php($itemContent = $item->content)
						<div class="swiper-slide">
							<div class="service-two__item">
								<div class="image">
									<img class="component-blog-cover" src="{{ asset($itemContent->service_cover->value) }}" alt="image">
								</div>
								<div class="service-two__content">
									<div class="icon">
										<img src="{{ asset($itemContent->dark_icon->value) }}" alt="icon">
									</div>
									<div class="shape"><img src="{{ asset($itemContent->shape_for_grid->value) }}"
									                        alt="shape"></div>
									<h4><a href="{{ route('content.details', ['section' => $data->section, 'id' => $item->id]) }}" class="primary-hover">{{ $itemContent->heading->value }}</a></h4>
									<p>{{ Str::limit($itemContent->summary->value, $content->limit_summary->value) }}</p>
									<a class="read-more-btn" href="{{ route('content.details', ['section' => $data->section, 'id' => $item->id]) }}">{{ $itemContent->button_title->value }}<i
											class="fa-regular fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
	</div>
</section>
@extends('backend.layouts.app')
@section('title')
	{{  __('Subscription') }}
@endsection
@section('content')
	<div class="py-4">
		<div class="d-flex justify-content-between w-100 flex-wrap">
			<div class="mb-3 mb-lg-0">
				<h1 class="h4">{{  __('Subscription') }}</h1>
			</div>
		</div>
	</div>
	<div class="card border-0 shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-centered table-nowrap mb-0 rounded table-hover align-items-center">
					<thead class="thead-light">
					<tr>
						<th class="border-bottom">{{ __('Name') }}</th>
						<th class="border-bottom">{{ __('Mail') }}</th>
						<th class="border-bottom">{{ __('Join Date') }}</th>
						<th class="border-bottom">{{ __('Action') }}</th>
					</tr>
					</thead>
					<tbody>
					@foreach($subscriptions as $subscription)
						<tr>
							<td><span class="fw-bold">{{ $subscription->name }}</span></td>
							<td><span class="fw-bold">{{ $subscription->email }}</span></td>
							<td><span class="fw-bold">{{ $subscription->created_at->format('Y-m-d') }}</span></td>
							<td>
								<span data-id="{{ $subscription->id }}" title="{{ __('mail send') }}" class="send-mail cursor">
										<x-svg i="email"/>
								</span>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				@if($subscriptions->count() == 0)
					<h4 class="text-center text-muted py-3">{{ __('No Data Available') }}</h4>
				@endif
			
			</div>
		</div>
	</div>
	
	{{--Send Mail Modal--}}
	@include('backend.subscription.partial._send_mail_modal')

@endsection
@section('script')
	<script>
        $(document).ready(function () {
            $('.send-mail').on('click', function () {
                var id = $(this).data('id');

                $('#subscription_id').val(id);

                $('#send-mail-modal').modal('show');
            });
        });
	</script>
@endsection


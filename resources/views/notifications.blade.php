	@foreach(auth()->user()->unreadNotifications as $notification)
    
											<div class="d-flex flex-stack py-4">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-35px me-4">
														<span class="symbol-label bg-light-primary">
															<i class="fas fa-ticket fa2x"></i>
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Title-->
													<div class="mb-0 me-2" id="notification-information">
														<a href="/tickets/{{ $notification->data['id'] }}?uuid={{$notification->id}}" data-notifecationId="{{$notification->id}}"  class="fs-6 text-gray-800 text-hover-primary fw-bold">{{ $notification->data['title'] }}</a>
														<div class="text-gray-400 fs-7" id="notification-user">{{ $notification->data['user']}}</div>
													</div>
													<!--end::Title-->
												</div>
												<!--end::Section-->
												<!--begin::Label-->
												<span class="badge badge-light fs-8">{{ $notification->created_at}}</span>
												<!--end::Label-->
											<!--end::Item-->
											</div>
        @endforeach	
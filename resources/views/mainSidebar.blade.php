	<!--begin::Wrapper-->
	<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
	    <!--begin::Sidebar-->
	    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
	        <!--begin::Logo-->
	        <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
	            <!--begin::Logo image-->
	            <a href="/dashboard">
	                <img alt="Logo" src="{{asset('assets/media/logos/logo-food.png')}}" class="h-50px  text-center  app-sidebar-logo-default " />
	                <img alt="Logo" src="{{asset('assets/media/logos/logo-food.png')}}" class="h-25px app-sidebar-logo-minimize " />
	            </a>
	            <!--end::Logo image-->
	            <!--begin::Sidebar toggle-->
	            <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
	                <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
	                <span class="svg-icon svg-icon-2 rotate-180">
	                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                        <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
	                        <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
	                    </svg>
	                </span>
	                <!--end::Svg Icon-->
	            </div>
	            <!--end::Sidebar toggle-->
	        </div>
	        <!--end::Logo-->
	        <!--begin::sidebar menu-->
	        <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
				<!--begin::Menu wrapper-->
	            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
					<!--begin::Menu-->
	                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
						<!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
	                    <!--begin:Menu item-->
	                    <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
	                        <!--begin:Menu link-->
	                        <span class="menu-link">
	                            <span class="menu-icon">
									<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
	                                <span class="svg-icon svg-icon-2">
	                                   
										<i class="fas fa-ticket fa-2x"></i>
	                                </span>
	                                <!--end::Svg Icon-->
	                            </span>
	                            <span class="menu-title">Ticket</span>
	                            <span class="menu-arrow"></span>
	                        </span>
	                        <!--end:Menu link-->
	                        <!--begin:Menu sub-->
	                        <div class="menu-sub menu-sub-accordion">
	                            <!--begin:Menu item-->
	                            <div class="menu-item">
	                                <!--begin:Menu link-->
									@can('all-tickets')
	                                <a class="menu-link" href="tickets">
	                                    <span class="menu-bullet">
	                                        <span class="bullet bullet-dot"></span>
	                                    </span>
	                                    <span class="menu-title">All Tickets</span>
	                                </a>
									@endcan
									<!--begin:Menu link-->
									@can('role-my-depatment-tickets')
	                                <!--begin:Menu link-->
	                                <a class="menu-link" href="departmentticket">
	                                    <span class="menu-bullet">
	                                        <span class="bullet bullet-dot"></span>
	                                    </span>
	                                    <span class="menu-title"> My Department Tickets</span>
	                                </a>
									<!--begin:Menu link-->
									@endcan
									@can('ticket-history')
									<a class="menu-link" href="tickethistory">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Ticket History</span>
									</a>
									<!--end:Menu link-->
									@endcan

	                              
	                                <!--end:Menu link-->
	                            </div>
	                            <!--end:Menu item-->


	                        </div>
	                        <!--end:Menu sub-->
	                    </div>
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
						@can('users')
	                    <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
	                        <!--begin:Menu link-->
	                        <span class="menu-link">
	                            <span class="menu-icon">
	                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
	                                <span class="svg-icon svg-icon-2">
	                                    <i class="fa-solid fa-users fa-beat fa-2xs"></i>
	                                </span>
	                                <!--end::Svg Icon-->
	                            </span>
	                            <span class="menu-title">Users </span>
	                            <span class="menu-arrow"></span>
	                        </span>
	                        <!--end:Menu link-->
	                        <!--begin:Menu sub-->
	                        <div class="menu-sub menu-sub-accordion">
	                            <!--begin:Menu item-->
	                            <div class="menu-item">
	                                <!--begin:Menu link-->
	                                <a class="menu-link" href="/users">
	                                    <span class="menu-bullet">
	                                     <i class="fa-solid fa-user fa-beat-fade"></i>
	                                    </span>
	                                    <span class="menu-title">Users  </span>
	                                </a>
	                                <!--end:Menu link-->
	                                <!--begin:Menu link-->
	                                <a class="menu-link" href="/roles">
	                                    <span class="menu-bullet">
	                                       <i class="fa-sharp fa-solid fa-road-barrier fa-beat"></i>
	                                    </span>
	                                    <span class="menu-title">Roles & permessions</span>
	                                </a>
	                                <!--end:Menu link-->
	                            </div>
	                            <!--end:Menu item-->


	                        </div>
	                        <!--end:Menu sub-->
	                    </div>
						@endcan
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->

						    <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
	                        <!--begin:Menu link-->
	                        <span class="menu-link">
	                            <span class="menu-icon">
	                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
	                                <span class="svg-icon svg-icon-2">
	                                    <i class="fas fa-file fa-2x"></i>
	                                </span>
	                                <!--end::Svg Icon-->
	                            </span>
	                            <span class="menu-title">Reports </span>
	                            <span class="menu-arrow"></span>
	                        </span>
	                        <!--end:Menu link-->
	                        <!--begin:Menu sub-->
	                        <div class="menu-sub menu-sub-accordion">
	                            <!--begin:Menu item-->
	                            <div class="menu-item">
	                                <!--begin:Menu link-->
	                                <a class="menu-link" href="/ProblemTypeReport">
	                                    <span class="menu-bullet">
	                                        <i class="fa-solid fa-triangle-exclamation fa-beat fa-2x"></i>
	                                    </span>
	                                    <span class="menu-title"> Department <br>& <br> Problem Types Reports</span>
	                                </a>
	                                <!--end:Menu link-->
	                                <!--begin:Menu link-->
	                                <a class="menu-link" href="/UserReport">
	                                    <span class="menu-bullet">
	                                       <i class="fa-solid fa-user fa-bounce"></i>
	                                    </span>
	                                    <span class="menu-title">User Report</span>
	                                </a>
	                                <!--end:Menu link-->
	                                <!--begin:Menu link-->
	                                <a class="menu-link" href="/">
	                                    <span class="menu-bullet">
	                                        <span class="bullet bullet-dot"></span>
	                                    </span>
	                                    <span class="menu-title">Department Report</span>
	                                </a>
	                                <!--end:Menu link-->
	                                <!--begin:Menu link-->
	                                <a class="menu-link" href="/">
	                                    <span class="menu-bullet">
	                                        <span class="bullet bullet-dot"></span>
	                                    </span>
	                                    <span class="menu-title">Total Report</span>
	                                </a>
	                                <!--end:Menu link-->
	                            </div>
	                            <!--end:Menu item-->


	                        </div>
	                        <!--end:Menu sub-->
	                    </div>
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
@can('settings')
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/layouts/lay008.svg-->
												<span class="svg-icon svg-icon-2">
													
													<i class="fa-solid fa-gear fa-spin fa-2xs"></i>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Settings</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="/departmentes">
													<span class="menu-bullet">
														<i class="fa-sharp fa-solid fa-house-user fa-beat"></i>
													</span>
													<span class="menu-title">Departments</span>
												</a>
												<!--end:Menu link-->
												<!--begin:Menu link-->
												<a class="menu-link" href="/priorities">
													<span class="menu-bullet">
														<i class="fa-solid fa-list-check fa-beat"></i>
													</span>
													<span class="menu-title">Priorities</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="problemestype">
													<span class="menu-bullet">
														<i class="fa-solid fa-quote-left fa-beat"></i>
													</span>
													<span class="menu-title">problems Types </span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->

											<!--end:Menu item-->
											<!--begin:Menu item-->
											<!--
											<div class="menu-item">
											
												<a class="menu-link" href="../../demo1/dist/widgets/feeds.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Feeds</span>
												</a>
											
											</div>
											-->
											<!--end:Menu item-->

										</div>
										<!--end:Menu sub-->
									</div>
									@endcan
				
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
                        <!-------------------------------------------------------------------------------------------------------------------->
	                   
























	                </div>
	                <!--end::Menu-->
	            </div>
	            <!--end::Menu wrapper-->
	        </div>
	        <!--end::sidebar menu-->

	    </div>
	    <!--end::Sidebar-->
	

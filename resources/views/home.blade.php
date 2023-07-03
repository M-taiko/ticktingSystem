<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    @include('header')
    <title>Foodnation Tickets system</title>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }

    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('mainTopNavbar')
            @include('mainSidebar')
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <!-------------------------------------------------------->
                <div class="card bg-secondary  mb-3" style="width: 99% ; margin:5px">
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack  ">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Home</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">TicketType</li>
                                        <!--end::Item-->
                                    </ul>






                                    <!--end::Breadcrumb-->
                                    <div class="card-body">
                                        <!---------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                        @can('all-tickets')
                                        <div class="row">
                                            <h1 class="text-center"> All Department Tickets </h1>
                                            <div class="col background-animation">
                                                <div class="">
                                                    <div class="card LquiedCARD" style="background-color: #1532ff; background-image:url('assets/media/patterns/vector-1.png');">
                                                        <!--begin::Header-->
                                                    

                                                        <div class="card-header pt-5">
                                                            <!--begin::Title-->
                                                            <div class="card-title d-flex flex-column ">
                                                                <!--begin::Amount-->
                                                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 ">
                                                                    @foreach($allDeparmentNewTicketCount as $allTicket)
                                                                    {{number_format($allTicket->TotalTickets)}}
                                                                    @endforeach
                                                                </span>
                                                                <!--end::Amount-->
                                                                <!--begin::Subtitle-->
                                                                <span class="text-white opacity-75  fs-6">All Ticket For All Departments</span>
                                                                <!--end::Subtitle-->
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                             <section>
                                                            <div class='air air1'></div>
                                                            <div class='air air2'></div>
                                                            <div class='air air3'></div>
                                                            <div class='air air4'></div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col background-animation">
                                                <div class="card  LquiedCARD " style="background-color: #25dd0f;background-image:url('assets/media/patterns/vector-1.png'); z-index:1;">
                                                    <!--begin::Header-->


                                                      

                                                    <div class="card-header pt-5">
                                                        <!--begin::Title-->
                                                        <div class="card-title d-flex flex-column">
                                                            <!--begin::Amount-->
                                                            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                                                                @foreach($allDeparmentNewTicketCount as $allTicket)
                                                                {{number_format($allTicket->NewTicket)}}
                                                                @endforeach
                                                            </span>
                                                            <!--end::Amount-->
                                                            <!--begin::Subtitle-->
                                                            <span class="text-white opacity-75 pt-1 fw-semibold fs-6">New Ticket <br>For All Departments</span>
                                                            <!--end::Subtitle-->
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
 <section>
                                                            <div class='air air1'></div>
                                                            <div class='air air2'></div>
                                                            <div class='air air3'></div>
                                                            <div class='air air4'></div>
                                                        </section>
                                                </div>
                                            </div>


                                            <div class="col background-animation">
                                                <div class="card card-flush LquiedCARD " style="background-color: #9cb708;background-image:url('assets/media/patterns/vector-1.png'); z-index:1;">
                                                    <!--begin::Header-->


                                                       

                                                    <div class="card-header pt-5">
                                                        <!--begin::Title-->
                                                        <div class="card-title d-flex flex-column">
                                                            <!--begin::Amount-->
                                                            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                                                                @foreach($allDeparmentNewTicketCount as $allTicket)
                                                                {{number_format($allTicket->PendingTickets)}}
                                                                @endforeach
                                                            </span>
                                                            <!--end::Amount-->
                                                            <!--begin::Subtitle-->
                                                            <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Pending Ticket <br>For All Departments</span>
                                                            <!--end::Subtitle-->
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
<section>
                                                            <div class='air air1'></div>
                                                            <div class='air air2'></div>
                                                            <div class='air air3'></div>
                                                            <div class='air air4'></div>
                                                        </section>
                                                </div>
                                            </div>


                                            <div class="col background-animation">
                                                <div class="card   LquiedCARD" style="background-color: #f10000;background-image:url('assets/media/patterns/vector-1.png');z-index:1;">
                                                    <!--begin::Header-->


                                                      

                                                    <div class="card-header pt-5">
                                                        <!--begin::Title-->
                                                        <div class="card-title d-flex flex-column">
                                                            <!--begin::Amount-->
                                                            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                                                                @foreach($allDeparmentNewTicketCount as $allTicket)
                                                                {{number_format($allTicket->ClosedTickets)}}
                                                                @endforeach
                                                            </span>
                                                            <!--end::Amount-->
                                                            <!--begin::Subtitle-->
                                                            <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Closed Tickets <br>For All Departments</span>
                                                            <!--end::Subtitle-->
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
 <section>
                                                            <div class='air air1'></div>
                                                            <div class='air air2'></div>
                                                            <div class='air air3'></div>
                                                            <div class='air air4'></div>
                                                        </section>
                                                </div>
                                            </div>




                                        </div>

                                        @endcan

                                        @can('role-my-depatment-tickets')
                                        <hr style="width:100%">
                                        <div class="row">
                                            <h1 class="text-center">Tickets For : ( {{ Auth::user()->DepartmentName }} ) Department </h1>
                                            <div class="col background-animation">
                                                <div class="">
                                                    <div class="card LquiedCARD" style="background-color: #1532ff;background-image:url('assets/media/patterns/vector-1.png');z-index:1;">


                                                         

                                                        <!--begin::Header-->
                                                        <div class="card-header pt-5">
                                                            <!--begin::Title-->
                                                            <div class="card-title d-flex flex-column">
                                                                <!--begin::Amount-->
                                                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                                                                    @foreach($myDepartmentTickets as $MyDepartmentTicket)
                                                                    {{number_format($MyDepartmentTicket->TotalTickets)}}
                                                                    @endforeach
                                                                </span>
                                                                <!--end::Amount-->
                                                                <!--begin::Subtitle-->
                                                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">All Ticket <br>For My Department</span>
                                                                <!--end::Subtitle-->
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                         <section>
                                                            <div class='air air1'></div>
                                                            <div class='air air2'></div>
                                                            <div class='air air3'></div>
                                                            <div class='air air4'></div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col background-animation">
                                                <div class="card   LquiedCARD" style="background-color: #25dd0f;background-image:url('assets/media/patterns/vector-1.png');z-index:1;">
                                                    <!--begin::Header-->




                                                    <div class="card-header pt-5">
                                                        <!--begin::Title-->
                                                        <div class="card-title d-flex flex-column">
                                                            <!--begin::Amount-->
                                                            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                                                                @foreach($myDepartmentTickets as $MyDepartmentTicket)
                                                                {{number_format($MyDepartmentTicket->NewTicket)}}
                                                                @endforeach
                                                            </span>
                                                            <!--end::Amount-->
                                                            <!--begin::Subtitle-->
                                                            <span class="text-white opacity-75 pt-1 fw-semibold fs-6">New Ticket <br>For My Department</span>
                                                            <!--end::Subtitle-->
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>

                                                      <section>
                                                            <div class='air air1'></div>
                                                            <div class='air air2'></div>
                                                            <div class='air air3'></div>
                                                            <div class='air air4'></div>
                                                        </section>
                                                </div>
                                            </div>


                                            <div class="col background-animation">
                                                <div class="card   LquiedCARD" style="background-color: #9cb708;background-image:url('assets/media/patterns/vector-1.png');z-index:1;">
                                                    <!--begin::Header-->


                                                      

                                                    <div class="card-header pt-5">
                                                        <!--begin::Title-->
                                                        <div class="card-title d-flex flex-column">
                                                            <!--begin::Amount-->
                                                            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                                                                @foreach($myDepartmentTickets as $MyDepartmentTicket)
                                                                {{number_format($MyDepartmentTicket->PendingTickets)}}
                                                                @endforeach
                                                            </span>
                                                            <!--end::Amount-->
                                                            <!--begin::Subtitle-->
                                                            <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Pending Ticket <br>For My Department</span>
                                                            <!--end::Subtitle-->
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                     <section>
                                                            <div class='air air1'></div>
                                                            <div class='air air2'></div>
                                                            <div class='air air3'></div>
                                                            <div class='air air4'></div>
                                                        </section>

                                                </div>
                                            </div>


                                            <div class="col background-animation">
                                                <div class="card  LquiedCARD" style="background-color: #f10000;background-image:url('assets/media/patterns/vector-1.png');z-index:1;">
                                                    <!--begin::Header-->


                                                      

                                                    <div class="card-header pt-5">
                                                        <!--begin::Title-->
                                                        <div class="card-title d-flex flex-column">
                                                            <!--begin::Amount-->
                                                            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                                                                @foreach($myDepartmentTickets as $MyDepartmentTicket)
                                                                {{number_format($MyDepartmentTicket->ClosedTickets)}}
                                                                @endforeach
                                                            </span>
                                                            <!--end::Amount-->
                                                            <!--begin::Subtitle-->
                                                            <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Closed Tickets <br>For My Department</span>
                                                            <!--end::Subtitle-->
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>

                                                        <section>
                                                            <div class='air air1'></div>
                                                            <div class='air air2'></div>
                                                            <div class='air air3'></div>
                                                            <div class='air air4'></div>
                                                        </section>
                                                </div>
                                            </div>
                                        </div>
                                        @endcan
                                            <br>
                                        <!------------------------------------------start of  chartes---------------------------------------------------------->
                                        <div class="row "> <!-----    background-animation          ------->
                                        <!------------------------------start  Bar chart ------------------------------->
                                        <div class="col-xl-6 ">
											<!--begin::Charts Widget 1-->
											<div class="card card-xl-stretch mb-xl-6 ">
												<!--begin::Header-->
												<div class="card-header">
													<!--begin::Title-->
													<h3 class="card-title align-items-start flex-column">
														<span class="card-label fw-bold fs-3 mb-1">Tickets Statistics</span>
														<span class="text-muted fw-semibold fs-7">More than {{ \App\Models\tickets::count()}}  Tickets For All Departments</span>
													</h3>
													<!--end::Title-->
													<!--begin::Toolbar-->
													<div class="card-toolbar">
														<!--begin::Menu-->
														
														
														<!--end::Menu-->
													</div>
													<!--end::Toolbar-->
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body">
													<!--begin::Chart-->
													{!! $BarChart->render() !!}
												</div>
												<!--end::Body-->
											</div>
											<!--end::Charts Widget 1-->
										</div>


                                        <!----------------------End Of Bar Charts   --------------------->

                                        <!----------------------start Of Bai Charts   --------------------->
                                             <div class="col-xl-6">
											<!--begin::Charts Widget 1-->
											<div class="card card-xl-stretch mb-xl-6">
												<!--begin::Header-->
												<div class="card-header">
													<!--begin::Title-->
													<h3 class="card-title align-items-start flex-column">
														<span class="card-label fw-bold fs-3 mb-1">Top  Members Statistics</span>
														<span class="text-muted fw-semibold fs-7">More than {{ \App\Models\User::count()}}   Members</span>
													</h3>
													<!--end::Title-->
													<!--begin::Toolbar-->
													<div class="card-toolbar">
														<!--begin::Menu-->
														
														
														<!--end::Menu-->
													</div>
													<!--end::Toolbar-->
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body" >
													<!--begin::Chart-->
													{!! $baiChart->render() !!}
												</div>
												<!--end::Body-->
											</div>
											<!--end::Charts Widget 1-->
										</div>
                                        <!----------------------End Of Bai Charts   --------------------->
                                        </div>
                                        <!-------------------------------------------end of chartes--------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                    </div>



                                </div>
                            </div>
                            <!-------------------------------------------------------->
                            <!--end::Page title-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <section>
                        <div class='air air1'></div>
                        <div class='air air2'></div>
                        <div class='air air3'></div>
                        <div class='air air4'></div>
                    </section>
                </div>

                <!--end::Content wrapper-->
                <!--begin::Footer-->
                <div id="kt_app_footer" class="app-footer">

                    <!--begin::Footer container-->
                    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2023&copy;</span>
                            <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Copy Right to FoodNation</a>
                        </div>
                        <!--end::Copyright-->

                    </div>
                    <!--end::Footer container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->

    </div>
    <!--end::Page-->
    <!--end::Page-->
    </div>
    <!--end::App-->






    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->






    <!--end::Modals-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";

    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>

    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/share-earn.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
</html>

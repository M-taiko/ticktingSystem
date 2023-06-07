<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../" />
    <title>Foodnation ticketing System</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/logo-food.png" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
    <style>
        table,
        tr,
        th,
        td {
            text-align: center !important;
            word-wrap: break-word;

        }

        td {
            line-break: anywhere;
        }

    </style>
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
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Show tickets</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="tickets" class="text-muted text-hover-primary">Show Ticket </a>
                                        </li>

                                    </ul>
                                    <!--end::Breadcrumb-->
                                    <div class="card-body">
                                        <!---------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <div class="card p-10" style="overflow: scroll;">
                                                    <div class="card-header">
                                                        Ticket Detailes
                                                    </div>
                                                    @if (!empty($tickets))
                                                    @foreach ($tickets as $v)
                                                    <table class="table table-bordered table-striped" style="width:40rem">
                                                        <tbody>
                                                            <tr>
                                                                <th>
                                                                    Ticket id :
                                                                </th>
                                                                <td>
                                                                    {{ $v->id }}

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Ticket Title :
                                                                </th>
                                                                <td>
                                                                    {{ $v->TicketTitle }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Department Name
                                                                </th>
                                                                <td>
                                                                    {{ $v->GetTheDepartmentName->DepartmentName }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Piority :
                                                                </th>
                                                                <td>
                                                                    {{ $v->priority->name }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Reporting User
                                                                </th>
                                                                <td>
                                                                    {{ $v->ReportingUser }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Ticket Satas :
                                                                </th>
                                                                <td>
                                                                    {{ $v->Ticketstate }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    TicketDetailes :
                                                                </th>
                                                                <td>
                                                                    {{ $v->TicketDetails }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    The Ticket Created By:
                                                                </th>
                                                                <td>
                                                                    {{ $v->createdBY }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    The ticket Created At :
                                                                </th>
                                                                <td>
                                                                    {{ $v->created_at }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                @can('role-assign-to-user')
                                                                <th>
                                                                    Assigned User :
                                                                </th>
                                                                <td>

                                                                    <?php
                                                                            if ($v->assignuser == '') {
                                                                                echo '
                                                                            <a  class="modal-effect btn btn-primary delete btn btn-info btn-sm "
                                                                            data-effect="effect-scale"
                                                                            data-id=" ' .$v->id .'"
                                                                            data-bs-toggle="modal"
                                                                            href="#modaldemo18" >Assign To User</a>';
                                                                            } else {
                                                                                echo $v->assignuser;
                                                                                echo '
                                                                            <a  class="modal-effect btn btn-primary delete btn btn-info btn-sm "
                                                                            data-effect="effect-scale"
                                                                            data-id="'. $v->id.'"
                                                                            data-bs-toggle="modal"
                                                                            href="#modaldemo18" >Assign To  another User</a>';
                                                                            }
                                                                            ?>

                                                                </td>
                                                            </tr>
                                                            @endcan


                                                        </tbody>
                                                    </table>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col" style="width:39rem; margin-left: 16px;">
                                                <div class="card p-10" style="width:39rem">
                                                    <div class="card-header">
                                                        Ticket Resolves
                                                    </div>
                                                    <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px" style="height: 279px;">
                                                        <!--begin::Timeline items-->
                                                        <div class="timeline">
                                                            <!--begin::Timeline item-->
                                                            <!--begin::Timeline line-->
                                                            <!--end::Timeline line-->
                                                            <!--begin::Timeline icon-->
                                                            @if (!empty($tickethistory))
                                                            @foreach ($tickethistory as $v)
                                                            <div class="timeline-item">

                                                                <div class="timeline-line w-40px"></div>

                                                                <i class="fa fa-pen m-10"></i>
                                                                <!--end::Timeline icon-->
                                                                <!--begin::Timeline content-->
                                                                <div class="timeline-content mb-10 mt-n1 p-10 " style="background-color: #02670ea1; background-image: url('{{ asset('assets/media/patterns/vector-1.png') }}'); color:white;  border-radius: 16px; ">
                                                                    <!--begin::Timeline heading-->
                                                                    <div class="pe-3 mb-5">
                                                                        <!--begin::Title-->
                                                                        <div class="fs-5 fw-semibold mb-2">
                                                                            {{ $v->comment_text }}</div>
                                                                        <!--end::Title-->
                                                                        <!--begin::Description-->
                                                                        <hr style="width:100%">
                                                                        <div class="d-flex align-items-center mt-1 fs-6">
                                                                            <!--begin::Info-->
                                                                            <div class="text me-2 fs-7">
                                                                                Added
                                                                                at {{ $v->created_at }} by
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="overflow-auto pb-5">
                                                                        <div class="d-flex align-items-center card border border-dashed border-gray-300 rounded min-w-75px px-7 py-3 mb-5" style="color:black ">
                                                                            {{ $v->solving_User }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Timeline details-->
                                                                </div>
                                                                <!--end::Timeline content-->

                                                            </div>
                                                            @endforeach
                                                            @endif

                                                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                                                                @foreach ($tickets as $v)
                                                                @if( $v->Ticketstate == 'New' || $v->Ticketstate == 'pending')
                                                                <a class="modal-effect btn btn-primary m-1 btn-block" data-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">Add New Resolve</a>
                                                                @endif
                                                                @endforeach


                                                                @can('Edit-ticket-stats')
                                                                <a class="modal-effect btn btn-primary m-1 btn-block" data-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo12">Edit This Resolve status</a>
                                                                @endcan



                                                            </div>
                                                        </div>
                                                        <!--end::Timeline items-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                    </div>
                                    <!-- Basic modal -->
                                    <div class="modal" id="modaldemo8">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add New Resolve </h6><button aria-label="Close" class="close btn" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('tickethistory.store') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="input-group mb-3 d-none">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="ticket_id">ticket_id</span>
                                                            </div>

                                                            <select name="ticket_id" required id="select-beast" class="form-control  nice-select  custom-select">
                                                                @foreach ($tickets as $v)
                                                                <option value=' {{ $v->id }}'>
                                                                    {{ $v->id }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3 d-none">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="user_id">user_id</span>
                                                            </div>
                                                            <select name="user_id" required id="select-beast" class="form-control  nice-select  custom-select">
                                                                <option value='{{ Auth::user()->id }}'>
                                                                    {{ Auth::user()->id }} </option>
                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="solving_User">Solving User</span>
                                                            </div>
                                                            <select name="solving_User" required id="solving_User" class="form-control  nice-select  custom-select">
                                                                <option value='{{ Auth::user()->name }}'>
                                                                    {{ Auth::user()->name }} </option>
                                                            </select>
                                                        </div>


                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="Ticketstate">Ticket
                                                                    state</span>
                                                            </div>
                                                            <select name="Ticketstate" required id="select-beast" class="form-control  nice-select  custom-select">
                                                                <option value='pending'>pending</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Your Resolve</span>
                                                            </div>
                                                            <textarea class="form-control" name="comment_text" required id="TicketDetails" placeholder="write the Details of your Resolve ....." id="comment_text" rows="3" aria-describedby="comment_text"></textarea>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn ripple btn-primary" type="submit">Add
                                                                New Resolve</button>
                                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Basic modal -->

                                    <!-- assign to user -->
                                    <div class="modal" id="modaldemo18">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Assign user to Resolve This Ticket</h6>
                                                    <button aria-label="Close" class="close btn" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="assign" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body assign-modal">
                                                        <p>assign user to this ticket </p><br>
                                                        @if (!empty($tickets))
                                                        @foreach ($tickets as $v)
                                                        <input type="hidden" name="id" id="assign-id" value="{{$v->id}}">
                                                        @endforeach
                                                        @endif
                                                        @can('assign-any-user')
                                                        <select name="assignuser" required id="select-beast" class="form-control  nice-select  custom-select">
                                                            <option value=''> Select Form Users </option>

                                                            <?php
                                                            $Users = DB::table('users')
                                                                ->select('id', 'name')
                                                                ->get();
                                                            foreach ($Users as $User) {
                                                                echo "<option value='" . $User->name . "' > $User->name </option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        @endcan
                                                        @can('assign-my-department-user')

                                                        @endcan


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Confirm
                                                            Assigning User</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- assign to user -->
                                    <!-- Colse Ticket modal -->
                                    <div class="modal" id="modaldemo12">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> Edit Resolve status</h6><button aria-label="Close" class="close btn" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('update', $id) }}" method="get">
                                                        {{ csrf_field() }}
                                                        <div class="input-group mb-3 d-none">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="ticket_id">ticket_id</span>
                                                            </div>

                                                            <select name="ticket_id" required id="select-beast" class="form-control  nice-select  custom-select">
                                                                @foreach ($tickets as $v)
                                                                <option value=' {{ $v->id }}'>
                                                                    {{ $v->id }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>






                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="Ticketstate">Ticket
                                                                    state</span>
                                                            </div>
                                                            <select name="Ticketstate" required id="select-beast" class="form-control  nice-select  custom-select">
                                                                <option value='pending'>pending</option>
                                                                <option value='Closed'>Closed </option>
                                                            </select>
                                                        </div>



                                                        <div class="modal-footer">
                                                            <button class="btn ripple btn-primary" type="submit">Edit
                                                                ticket status</button>
                                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Colse Ticket modal -->


                                </div>
                            </div>
                            <!-------------------------------------------------------->
                            <!--end::Page title-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->

                </div>
                <!--end::Content wrapper-->
                <!--begin::Footer-->
                <div id="kt_app_footer" class="app-footer">
                    <!--begin::Footer container-->
                    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2023&copy;</span>
                            <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Copy Right
                                to FoodNation</a>
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

    <!--------get id from data-bs-button-------------------->
    <script>
        $('#modaldemo18').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')

            var modal = $(this)
            modal.find('.assign-modal #assign-id').val(id);;
        })

    </script>

    <!---------------------------->


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
    <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>

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

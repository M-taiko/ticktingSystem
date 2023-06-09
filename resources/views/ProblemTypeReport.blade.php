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
            <div class="app-main " id="kt_app_main">
                <!--begin::Content wrapper-->
                <!-------------------------------------------------------->
                <div class="card bg-secondary  mb-3" style="width: 100% ; margin:5px">
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack" style=" margin:5px;  max-width: none;">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3" style="width: 100% ; margin:5px">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Reports</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->

                                        <!--end::Item-->
                                        <!--begin::Item-->

                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">Problem Type Report</li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Breadcrumb-->
                                    <div class="card-body">
                                        <!---------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->
                                        <div class="col-xl-12 col-md-12 " style="width: 100% ; margin:5px;">
                                            <div class="card " style="width: 100% ; margin:5px ;   padding: 21px">
                                                <div class="card-header pb-0">
                                                    <form action="/ProblemTypeReport/search" method="POST" role="search" autocomplete="off">
                                                        {{ csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-lg-4" id="start_at">
                                                                <label for="exampleFormControlSelect1">From</label>

                                                                <input class="form-control "  value="{{ $start_at ?? '' }}" name="start_at" placeholder="YYYY-MM-DD" type="date">

                                                            </div>

                                                            <div class="col-lg-4" id="end_at">
                                                                <label for="exampleFormControlSelect1">To</label>
                                                                <input class="form-control fc-datepicker"  name="end_at" value="{{ $end_at ?? '' }}" placeholder="YYYY-MM-DD" type="date">
                                                            </div>

                                                            <div class="col-lg-4" id="Departments">
                                                                <label for="exampleFormControlSelect1">Select Department</label>
                                                                <select  name="departmentName" id="select-Department" class="form-control  nice-select  custom-select">

                                                                    <option value=''> Select Department to View There Tickets </option>

                                                                    <?php
                                                                    $departmentes = DB::table('departmentes')
                                                                        ->select('id', 'DepartmentName')
                                                                        ->get();
                                                                    foreach ($departmentes as $department) {
                                                                        echo "<option value='" . $department->id . "' > $department->DepartmentName </option>";
                                                                    }
                                                                    ?>
                                                                    
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <br>

                                                        <div class="row">
                                                            <div class="col-sm-1 col-md-1">
                                                                <button class="btn btn-primary btn-block">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div> <br>




                                                @if (isset($details))
                                                <hr style="width:100%">
                                                <div class="card-body">
                                                    <div class="table-responsive card-secoundry">




                                                        <table id="Ticket_report" class="table table-bordered  table-success table-striped  table-hover">
                                                            <thead class="text-center">
                                                                <tr>
                                                                    <th class="text-center">#</th>
                                                                    <th class="text-center"><b>Ticket Name</th>
                                                                    <th class="text-center"><b>Numbers Of Ticket</th>
                                                                    <th class="text-center"><b>Department Name</th>
                                                                    <th class="text-center"> <b>Ticket Staus</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-center">
                                                                <?php $encrement = 0; ?>
                                                                @foreach($details as $invoice)

                                                   <h1>     {{$invoice->department}} </h1>
                                                                <?php $encrement ++ ; ?>
                                                                <tr>

                                                                    <td> {{$encrement }}</td>
                                                                    <td> {{ $invoice->ProblemName}}</td>
                                                                    <td> {{ $invoice->ticket_count}}</td>
                                                                    <td> {{ $invoice->DepartmentName}}</td>
                                                                    <td> {{ $invoice->Ticketstate }}</td>


                                                                </tr>

                                                                @endforeach


                                                            </tbody>

                                                        </table>



                                                    </div>
                                                </div>
                                                @endif


                                                <!---------------------------------------------------------------------------------------------------->
                                                <!---------------------------------------------------------------------------------------------------->
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

        @include('footer')
        <script>
            $(document).ready(function() {
                $('#Ticket_report').DataTable();

            });

            $('#Ticket_report').DataTable({
                dom: 'Bfrtip'
                , buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });



          $(document).ready(function() {
            $('#select-Department').select2({
                placeholder: "Select From Department",
                allowClear: true,
                dropdownParent: $('#Departments')
            });
        });

        </script>

<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="../" />
    <title>Foodnation Roles</title>
     <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/logo-food.png')}}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />


    <!--end::data tables-->


    <!--end::data tables-->
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
                <div class="card mb-3" style="width: 99% ; margin:5px">
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3" style="width: inherit;">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Users - Role</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="role" class="text-muted text-hover-primary">Creat New Role</a>
                                        </li>

                                    </ul>
                                    <!----------------------------start session ------------------------------------------------->
                                    @if(session()->has('Add'))
                                    <br>
                                    <div class="alert alert-success alert-dismissible fade show " rol="alert">
                                        <strong>{{ session()->get('Add') }}</strong>
                                        <button type="button" class="close btn" data-bs-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                    @if(session()->has('Error'))
                                    <br>
                                    <div class="alert alert-danger alert-dismissible fade show " rol="alert">
                                        <strong>{{ session()->get('Error') }}</strong>
                                        <button type="button" class="close btn " data-bs-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                    @if(session()->has('edit'))
                                    <br>
                                    <div class="alert alert-warning alert-dismissible fade show " rol="alert">
                                        <strong>{{ session()->get('edit') }}</strong>
                                        <button type="button" class="close btn" data-bs-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif


                                    @if(session()->has('delete'))
                                    <br>
                                    <div class="alert alert-danger alert-dismissible fade show " rol="alert">
                                        <strong>{{ session()->get('delete') }}</strong>
                                        <button type="button" class="close btn" data-bs-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif


                                    <!----------------------------End session ------------------------------------------------->

                                    <!--end::Breadcrumb-->
                                    <div class="card-body">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                                            <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">Add new User Role </a>

                                            <!--end::Add customer-->
                                        </div>
                                        <!--end::Toolbar-->
                                        <!---------------------------------------------------------------------------------------------------->
                                        <!--------------------------Table Body-------------------------------------------------------------------------->
                                        <!---------------------------------------------------------------------------------------------------->


                                        <div class="card-body pt-0">
                                            <!--begin::Table-->
                                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                            <!-- row -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card mg-b-20">
                                                        <div class="card-body">
                                                            <div class="main-content-label mg-b-5">
                                                                <div class="col-xs-7 col-sm-7 col-md-7">
                                                                    <div class="form-group">
                                                                        <p>New Role Name :</p>
                                                                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!-- col -->
                                                                <div class="col-lg-4">
                                                                   
                                                                        
                                                                        @foreach($permission as $value)
                                                                        <label style="font-size: 16px;">
                                                                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                                            {{ $value->name }}</label><br>

                                                                        @endforeach
                                                                

                                                                 
                                                                </div>
                                                                <!-- /col -->
                                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- row closed -->
                                        </div>
                                        <!-- Container closed -->
                                    </div>
                                    <!-- main-content closed -->

                                    {!! Form::close() !!}
                                    <!--end::Table-->
                                </div>
                                <!---------------------------------------------------------------------------------------------------->
                                <!-------------------------------------Table Body--------------------------------------------------------------->
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


    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Delete Department</h6><button aria-label="Close" class="close btn" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="users/destroy " method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>Are You sure You Want To Delete This Department ?</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" vlaue="" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- delete -->






    <!--start::Modals-->

    <!--end::Modals-->








    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

    <!--end::Javascript-->




    @include('footer')
    <script type="text/javascript">
        $(function() {
            var table = $('#users').DataTable({
                dom: 'Bfrtip'
                , buttons: [
                    'copy', 'excel', 'print'
                , ]
                , ordering: true
                , processing: true
                , serverSide: false

            });
        });

    </script>
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var theuserName = button.data('username')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #username').val(theuserName);
        })

    </script>

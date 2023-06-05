<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    @section('content')
    <div class="card mb-3" style="width: 99% ; margin:5px">
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3" style="width: inherit;">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Settings</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="priorities" class="text-muted text-hover-primary">priorities</a>
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
                                <a class="modal-effect btn btn-primary btn-block" data-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">Add New Department</a>

                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!---------------------------------------------------------------------------------------------------->
                            <!--------------------------Table Body-------------------------------------------------------------------------->
                            <!---------------------------------------------------------------------------------------------------->


                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="priorities">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                            <th class="min-w-125px">#</th>
                                            <th class="min-w-125px"> Name</th>
                                            <th class="min-w-125px">Color</th>
                                            <th class="min-w-125px">action</th>

                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach($priorities as $key => $priority)
                                        <tr data-entry-id="{{ $priority->id }}">

                                            <td>
                                                {{ $priority->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $priority->name ?? '' }}
                                            </td>
                                            <td style="background-color:{{ $priority->color ?? '#FFFFFF' }}"></td>
                                            <td>





                                                <a class="modal-effect btn btn-primary delete btn btn-primary btn-sm btn-block" data-effect="effect-scale" data-name={{$priority->name}} data-coloe={{$priority->color}} data-id={{$priority->id}} data-bs-toggle="modal" href="#exampleModal2">Edit</a>


                                                <a class="modal-effect btn btn-primary delete btn btn-danger btn-sm btn-block" data-effect="effect-scale" data-departmentname={{$priority->name}} data-id={{$priority->id}} data-bs-toggle="modal" href="#modaldemo9">Delete</a>';



                                            </td>

                                        </tr>
                                        @endforeach



                                    </tbody>
                                    <!--end::Table body-->
                                </table>
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
    
    @endsection
</body>
</html>

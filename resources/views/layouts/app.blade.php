<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('header')
</head>
<body>
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


    <div id="app">
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
          <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                 @include('mainTopNavbar')
                 @include('mainSidebar')
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>

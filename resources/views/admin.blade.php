<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Started Template</title>
    <meta name="description" content="Website Template Started Laravel 10 Vue" />
    <meta name="keywords" content="Website Template Started Laravel 10 Vue" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:site_name" content="Template Website Laravel Vue" />
    <link rel="canonical" href="{{ url('/') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    @vite('resources/css/app-admin.css')

</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-offset="200" class="bg-white position-relative">

    <div id="main-app">
        <main-app></main-app>
    </div>

    <script>
        var apiUrl = "{{ url('/api/') }}";
        var baseUrl = "{{ url('/') }}";
        var assetUrl = "{{ asset('/assets/') }}/";
        var SUBFOLDER_DOMAIN = "{{ config('myconfig.SUBFOLDER_DOMAIN') }}";
    </script>


    <script>
        var hostUrl = "{{asset('assets/')}}";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
    
    @vite('resources/js/app-admin.js')
</body>

</html>

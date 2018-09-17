<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest (the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog Page | Metronic Frontend</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">

    <link rel="shortcut icon" href="favicon.ico">

    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="{{ asset('source/frontend/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('source/frontend/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="{{ asset('source/frontend/theme/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="{{ asset('source/frontend/theme/assets/global/css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('source/frontend/theme/assets/frontend/layout/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('source/frontend/theme/assets/frontend/layout/css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('source/frontend/theme/assets/frontend/layout/css/themes/red.css') }}" rel="stylesheet" id="style-color">
    <link href="{{ asset('source/frontend/theme/assets/frontend/layout/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('source/frontend/theme/assets/frontend/css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('source/frontend/theme/assets/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>


    <!-- Theme styles END -->
</head>
<!-- Head END -->
<body class="corporate">
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=274435310069045&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
    <!-- Header -->
    @include('frontend/layouts/header')
    <!-- /.navbar -->
       @yield('content')
    <!-- /.content-wrapper -->
    @include('frontend/layouts/footer')
<!-- ./wrapper -->
<!-- jQuery -->
    {{--@yield('script')--}}
    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>

    <script src="{{ asset('source/frontend/theme/assets/global/plugins/respond.min.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('source/frontend/theme/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('source/frontend/theme/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('source/frontend/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('source/frontend/theme/assets/frontend/layout/scripts/back-to-top.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{ asset('source/frontend/theme/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script><!-- pop up -->

    <script src="{{ asset('source/frontend/theme/assets/frontend/layout/scripts/layout.js') }}" type="text/javascript"></script>
    <script src="{{ asset('source/frontend/theme/assets/frontend/js/custom.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
        });
    </script>

    <script>
        CKEDITOR.replace('editor-post', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</body>
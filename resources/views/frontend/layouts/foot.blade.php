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
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initTwitter();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
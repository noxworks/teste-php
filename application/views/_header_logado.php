<!DOCTYPE html> 
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="Fabio Fila">
        <link rel="shortcut icon" href="<?= base_url('resources/images/favicon.ico'); ?>">
        <title><?= $this->config->item('site_title'); ?></title>

        <link rel="stylesheet" href="<?= base_url('resources'); ?>/fonts/open-sans/style.min.css"> <!-- common font  styles  -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/fonts/universe-admin/style.css"> <!-- universeadmin icon font styles -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/fonts/mdi/css/materialdesignicons.min.css"> <!-- meterialdesignicons -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/fonts/iconfont/style.css"> <!-- DEPRECATED iconmonstr -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/vendor/flatpickr/flatpickr.min.css"> <!-- original flatpickr plugin (datepicker) styles -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/vendor/simplebar/simplebar.css"> <!-- original simplebar plugin (scrollbar) styles  -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/vendor/tagify/tagify.css"> <!-- styles for tags -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/vendor/tippyjs/tippy.css"> <!-- original tippy plugin (tooltip) styles -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/vendor/select2/css/select2.min.css"> <!-- original select2 plugin styles -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/vendor/bootstrap/css/bootstrap.min.css"> <!-- original bootstrap styles -->
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" >
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/vendor/datatables/datatables.min.css" type="text/css" charset="utf-8">
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/css/bootstrap-switch.min.css" type="text/css" charset="utf-8">
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/js/bootstrap-select/css/bootstrap-select.min.css" type="text/css" charset="utf-8">
        <link rel="stylesheet" href="<?= base_url('resources'); ?>/js/bootstrap-select/css/ajax-bootstrap-select.min.css" type="text/css" charset="utf-8">

        <link rel="stylesheet" href="<?= base_url('resources'); ?>/css/style.min.css" id="stylesheet"> <!-- universeadmin styles -->
        <script src="<?= base_url('resources'); ?>/js/ie.assign.fix.min.js"></script>
        <script>
            var SITEURL = '<?= site_url(); ?>';
            function getSiteURL() {
                return SITEURL;
            }
        </script>
        <style>
            .simplebar-content{
                display: block !important;
            }
        </style>
    </head>
    <body class="js-loading "> <!-- add for rounded corners: form-controls-rounded -->
        <div class="page-preloader js-page-preloader">
            <div class="page-preloader__logo">
                
            </div>
            <div class="page-preloader__desc">Nox Works System</div>
            <div class="page-preloader__loader">
                <div class="page-preloader__loader-heading">System Loading</div>
                <div class="page-preloader__loader-desc">Widgets update</div>
                <div class="progress progress-rounded page-preloader__loader-progress">
                    <div id="page-loader-progress-bar" class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="page-preloader__copyright">Nox Works, 2018</div>
        </div>

        <!-- header top -->
        <div class="navbar navbar-light navbar-expand-lg">
            <span class="navbar-brand">
                <a href="/"><img src="<?= base_url('resources/images/logo-header.jpg'); ?>" style="height: 50px;" alt="" class="navbar-brand__logo"></a>
                <span class="ua-icon-menu slide-nav-toggle"></span>
            </span>

            <span class="navbar-brand-sm">
                <a href="/"><img src="<?= base_url('resources/images/logo-header.jpg'); ?>" alt="" class="navbar-brand__logo"></a>
                <span class="ua-icon-menu slide-nav-toggle"></span>
            </span>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="ua-icon-navbar-open navbar-toggler__open"></span>
                <span class="ua-icon-alert-close navbar-toggler__close"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <div class="navbar__menu">
                    
                </div>
                
                

                
            </div>
        </div>


        <div class="page-wrap">
            <?php $this->load->view('_menu'); ?>
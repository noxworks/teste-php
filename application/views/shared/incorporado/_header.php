<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="Fabio Fila">
        <meta http-equiv="cache-control" content="no-cache" />
        <link rel="icon" href="<?= base_url('resources/images/favicon.ico'); ?>">

        <title><?= $this->config->item('site_title'); ?></title>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?= base_url('components/bootstrap/css/bootstrap.min.css'); ?>" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="<?= base_url('components/bootstrap/css/bootstrap-theme.min.css'); ?>">

        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="<?= base_url('components/jquery/jquery.min.js');?>" ></script>
        <script type="text/javascript" src="<?= base_url('components/bootstrap/js/bootstrap.min.js');?>"></script>
        <script type="text/javascript" src="<?= base_url('components/bootstrap-multiselect/js/bootstrap-multiselect.js');?>" ></script>
        <script type="text/javascript" src="<?= base_url('vendor/igorescobar/jquery-mask-plugin/dist/jquery.mask.min.js');?>" ></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href="<?= base_url('resources/css/jquery.fancybox.css'); ?>">
        <!-- Custom styles for this template -->
        <link href="<?= base_url('resources/css/comum.css'); ?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            var SITEURL = '<?= site_url(); ?>';
            function getSiteURL() {
                return SITEURL;
            }
        </script>
    </head>
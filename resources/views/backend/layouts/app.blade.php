<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', app_name())</title>
<meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
<meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
 <!-- Styles -->
<link rel="stylesheet" type="text/css" href="/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/dist/css/style.css">
<link rel="stylesheet" type="text/css" href="/dist/css/login.css">
<link rel="apple-touch-icon-precomposed" href="/dist/images/icon/icon.png">
<link rel="shortcut icon" href="/dist/images/icon/favicon.ico">
<script src="/dist/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script>
    window.Laravel = <?php echo json_encode([
       'csrfToken' => csrf_token(),
]); ?>
</script>
<!--[if lt IE 9]>
{{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
{{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
{{ Html::script('https://cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js') }}
<![endif]-->
</head>

<body class="user-select">
@yield('body')

</body>
</html>
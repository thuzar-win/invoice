<!DOCTYPE html>
<html>
<head>
    <title>Invoice Application</title>
    <link rel="stylesheet" type="text/css" href="<?= URL::asset('/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= URL::asset('/css/override.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= URL::asset('/css/app.css') ?>">
    <script src="<?= URL::asset('/js/vue.min.js') ?>"></script>
    <script src="<?= URL::asset('/js/vue-resource.min.js') ?>"></script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
    @stack('scripts')
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.all_styles')

    <title>Thornior</title>
</head>
<body>
<style>
    span.vjs-icon-placeholder {
        font-size: 10px;
    }
    button.vjs-big-play-button .vjs-icon-placeholder{
        font-size: 30px;
    }
</style>
<!-- post top navbar start -->
@include('templates.video.v'.$post['post']->template_id)
<!-- Edit area ends  -->
</div>


<!-- optional js -->
@include('layouts.all_scripts')
@include('layouts.click_view_count_script')
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF GENERATOR</title>
</head>
<body>
<h3><strong>{{$news->title}}</strong></h3>
<br>
<img src="{{ public_path($news->banner_image) }}" style="width: 500px; height: 300px">
<br><br>
<p>
    {!! $news->content !!}</p>
<h5><strong>Author: </strong>{{$news->user->name}}</h5>
<h5><strong>Published Date: </strong>{{$news->news_date}}</h5>

<i style="font-size: 10px; float: right;">Print Date:  {{date("d M Y")}}</i>
</body>
</html>

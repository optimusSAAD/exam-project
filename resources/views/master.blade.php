<!DOCTYPE html>
<html lang="en">

<head>
    <title>Test Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>
<div class="jumbotron text-center" style="margin-bottom:0">
    <p>Resize this responsive page to see the effect!</p>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-md-8">
            Section 1
            <div class="row">
                @foreach($post_one as $post)
                    @if($post->section==0 && $post->publish==1)
                <div class="col-sm-6">
                    <div class="image">
                        <img src="{{asset('uploads/post/'.$post->image)}}" alt="" style="height: 200px;">
                        @if($post->type==1)
                        <i class="fa fa-file-video-o" aria-hidden="true"></i>
                        @endif
                    </div>
                    <h5><a href="{{route('detail',$post->slug)}}" >{{$post->title}}</a></h5>
                    <p>{!! str_limit($post->description,'50') !!}</p>
                </div>
                    @endif
                @endforeach

                <div class="col-sm-6">
                    <div class="row">
                        @foreach($post_two as $p)
                            @if($p->section==0 && $p->publish==1)
                        <div class="col-6">
                            <div class="image">
                                <img src="{{asset('uploads/post/'.$p->image)}}" alt="" style="height: 100px;">
                                @if($p->type==1)
                                    <i class="fa fa-file-video-o" aria-hidden="true"></i>
                                @endif
                            </div>
                            <h5><a href="{{route('detail',$p->slug)}}" >{{$p->title}}</a></h5>
                            <p>{!! str_limit($p->description,'50') !!}</p>
                        </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            Section 2
            @foreach($post_three as $po)
                @if($po->section==1 && $po->publish==1)
                    <div class="image">
                        <img src="{{asset('uploads/post/'.$po->image)}}" alt="" style="height: 200px;">
                        @if($po->type==1)
                            <i class="fa fa-file-video-o" aria-hidden="true"></i>
                        @endif
                    </div>
                    <h5><a href="{{route('detail',$po->slug)}}" >{{$po->title}}</a></h5>
                    <p>{!! str_limit($po->description,'50') !!}</p>
                @endif
            @endforeach
            <hr class="d-sm-none">
        </div>
    </div>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
</div>
</body>

</html>

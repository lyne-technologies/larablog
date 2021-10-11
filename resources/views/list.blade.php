<head>
    <style>
        *{font-family: sans-serif;}body{background: #f1f1f1;}.button{text-decoration:none;border: none;background: rgba(31, 41, 55,1);color: white;border-radius: 0.2em;font-weight: 500;font-size: .875rem;line-height: 1.25rem;padding: .5rem 1rem;}a.card{color: #000;text-decoration: none}
    </style>
</head>
<body>
<div class="content-wrap" style="max-width: 48rem;margin: 0 auto; ">


        @foreach($posts as $post)
            <a href="{{route(config('larablog.routes.single.name'), ['slug'=>$post->slug])}}" class="card" style="background: white;padding:10px;display: block;margin: 10px 0px">
                <div style="background-image: url('/blog-images/{{$post->featured_image}}');height: 200px;
                        background-size: cover;
                        background-position: center;">
                </div>
                <h3>{{$post->title}}</h3>
                <p>{{substr(strip_tags($post->body),0,300)}}</p>
            </a>
        @endforeach

</div>
</body>

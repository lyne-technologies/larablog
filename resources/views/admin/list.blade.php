@extends('larablog::layouts.admin')
@section('body')
    <div class="content-wrap p-2.5" style="background: white;">
        <div class="" style="margin: 5px 0px 15px;">
            <a href="{{route(config('larablog.routes.admin.create.name'))}}" class="button">Create new post</a>
            <a href="{{route(config('larablog.routes.admin.categories.list.name'))}}" class="button">Manage categories</a>
        </div>

        <div class="table-border">
            <div class="flex table-border-bottom p-2.5 gap-2.5">
                <div class="flex-1">Title</div>
                <div class="flex-1">Slug</div>
                <div class="flex-1">Updated at</div>
                <div class="flex-1">Created at</div>
            </div>
            @foreach($posts as $post)
                <a href="{{route(config('larablog.routes.admin.edit.name'), ['id'=>$post->id])}}"
                    class="flex p-2.5 gap-2.5"
                >
                    <div class="flex-1">{{$post->title}}</div>
                    <div class="flex-1">{{$post->slug}}</div>
                    <div class="flex-1">{{$post->updated_at}}</div>
                    <div class="flex-1">{{$post->created_at}}</div>
                </a>
            @endforeach

        </div>
    </div>
@endsection
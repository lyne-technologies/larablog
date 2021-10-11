@extends('larablog::layouts.admin')
@section('body')
    <div class="content-wrap" style="background: white;padding:10px;">
        <div class="" style="margin: 5px 0px 15px;">
            <a href="{{route(config('larablog.routes.admin.list.name'))}}" class="button">Posts</a>
        </div>

        <div class="table-border">
            <div class="flex table-border-bottom p-2.5 gap-2.5">
                <div class="flex-1">Name</div>
                <div class="flex-1">Slug</div>
                <div class="flex-1">Actions</div>
            </div>
            @foreach($categories as $category)
                <form action="{{route(config('larablog.routes.admin.categories.submit.name'))}}" class="flex p-2.5 gap-2.5">
                    @csrf
                    <div class="flex-1">
                        <input name="name" value="{{$category->name}}" class="w-full p-2">
                    </div>
                    <div class="flex-1">
                        <input name="slug" value="{{$category->slug}}" class="w-full p-2">
                    </div>
                    <div class="flex-1">
                        <button type="submit" class="button">Save</button> <a href="{{route(config('larablog.routes.admin.categories.destroy.name'), ['id'=>$category->id])}}">Delete</a>
                    </div>
                </form>
            @endforeach
            <form
                action="{{route(config('larablog.routes.admin.categories.submit.name'))}}"
                class="flex px-2.5 gap-2.5"
            >
                @csrf
                <div class="flex-1">
                    <input name="name" placeholder="Name" class="w-full p-2">
                </div>
                <div class="flex-1">
                    <input name="slug" placeholder="slug" class="w-full p-2">
                </div>
                <div class="flex-1">
                    <button type="submit" class="button">Save</button>
                </div>
            </form>

        </div>
    </div>
@endsection
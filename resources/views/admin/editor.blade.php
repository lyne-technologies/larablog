@extends('larablog::layouts.admin')
@section('body')
    <a href="{{route(config('larablog.routes.admin.list.name'))}}">All posts</a>
    <form class="flex gap-2.5 p-2.5" style="

    background: #f1f1f1f1;"
          action="{{route(config('larablog.routes.admin.submit.name'))}}"
          method="post"
          enctype="multipart/form-data"
    >
        @csrf
        <div class="p-3 flex-3 h-full" style="background: white; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
        >
            <div class="title-input-wrapper">
                <input type="text" id="title" name="title" class="title-input" placeholder="Title" value="{{@$post->title}}">
                <div class="mt-2">{{config('app.url')}}/blog/<input type="text" id="slug" name="slug" class="small-input" value="{{@$post->slug}}"></div>
            </div>
            <textarea id="body" name="body">{!! @$post->body !!}</textarea>
        </div>
        <div class="p-3 flex-1 flex" style="
      flex-direction: column;
      flex-basis: 100%;
      flex: 1; background: white;  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
        >
            <div style="background: white;">
                <div class="flex justify-between" style="flex-direction: row;flex-wrap: wrap;min-width: 100%;">
                    <div class="w-40 flex" style="flex-direction: column;">
                        <select name="status" id="status">
                            <option value="{{\LyneTechnologies\Larablog\Models\Post::STATUS_PUBLISHED}}" selected>Publish</option>
                            <option value="{{\LyneTechnologies\Larablog\Models\Post::STATUS_DRAFT}}">Draft</option>
                        </select>
                    </div>
                    <div style="display: flex;flex-direction: column;">
                        <button type="submit" class="button">{{$type == 'create' ? 'Create' : 'Update'}}</button>
                    </div>
                </div>

                <div>
                    <p>Featured Image</p>
                    <div class="title-input-wrapper">
                        <div style="padding: 5px;border-color:lightgrey;border-width:1px;border-style: solid;max-width: 300px;max-height: 300px;">
                            <img src="/blog-images/{{@$post->featured_image}}" style="max-width: 100%;max-height: 100%;">
                        </div>
                        <input type="file" id="featuredImage" name="featuredImage">
                    </div>
                </div>


                <div>
                    <p>SEO</p>
                    <div class="title-input-wrapper">
                        <input type="text" id="seoTitle" name="seoTitle" class="small-input" value="{{@$post->seo_title}}">
                    </div>
                    <div class="title-input-wrapper">
                        <textarea id="seoDescription" name="seoDescription">{{@$post->seo_description}}</textarea>
                    </div>
                </div>


                <div>
                    <p>Categories</p>
                    <div>
                        @foreach($categories as $category)
                            <div>
                                <input type="checkbox" id="categories[{{$category->id}}]" name="categories[{{$category->id}}]"
                                        {{in_array($category->id, @$post->categories?:[]) ? 'checked':''}}
                                >
                                <label for="categories[{{$category->id}}]">{{$category->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>




    </form>
    <script type="module" src="{{ asset('/vendor/larablog/js/editor.js') }}"></script>
@endsection

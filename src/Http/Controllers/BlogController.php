<?php

namespace LyneTechnologies\Larablog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use LyneTechnologies\Larablog\Http\Controllers\Controller;
use LyneTechnologies\Larablog\Models\Post;
use Illuminate\Support\Facades\File;
use LyneTechnologies\Larablog\Models\PostCategory;

class BlogController extends Controller
{
    public function create()
    {
        $data = [
            'type' => 'create',
            'categories' => PostCategory::all()
        ];

        return view('larablog::admin.editor', $data);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $post = Post::updateOrCreate(
            ['slug' => Str::slug($request->slug) ?: Str::slug($request->title)],
            [
                'status' => $request->status,
                'author' => Auth::id(),
                'seo_title' => $request->seoTitle,
                'seo_description' => $request->seoDescription,
                'title' => $request->title,
                'body' => $request->body,
                'categories' => array_keys($request->categories ?: [])
            ]
        );

        if ($request->featuredImage) {
            $imageName=self::fileName(pathinfo($request->featuredImage->getClientOriginalName(), PATHINFO_FILENAME), $request->featuredImage->extension());
            Storage::put('public/blog-images/'.$imageName, File::get($request->featuredImage));
            $post->featured_image = $imageName;
            $post->save();
        }

        return redirect(route(config('larablog.routes.admin.edit.name'), ['id' => $post->id]));
    }

    public function edit($id)
    {
        $data = [
            'type' => 'edit',
            'post' => Post::find($id),
            'categories' => PostCategory::all()
        ];
        return view('larablog::admin.editor', $data);
    }

    public function list()
    {
        $data = [
            'posts' => Post::all(),
        ];
        return view('larablog::admin.list', $data);
    }

    private function fileName($fileName, $fileExtension, $increment = 0)
    {
        $imageName = $increment > 0 ? "{$fileName}-{$increment}" : "{$fileName}";
        if (Storage::exists('public/blog-images/' . $imageName.'.'.$fileExtension)) {
            $increment++;
            return self::fileName($fileName, $fileExtension, $increment);
        } else {
            return Str::slug($imageName).'.'.$fileExtension;
        }
    }

    public function upload(Request $request){
        $fileName=self::fileName(pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME), $request->file('file')->extension());
        Storage::put('public/blog-images/'.$fileName, File::get($request->file('file')));
        return response()->json(['location'=>asset("blog-images/{$fileName}")]);
    }
}
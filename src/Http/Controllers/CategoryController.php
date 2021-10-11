<?php

namespace LyneTechnologies\Larablog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use LyneTechnologies\Larablog\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use LyneTechnologies\Larablog\Models\PostCategory;

class CategoryController extends Controller
{
    public function list()
    {
        return view('larablog::admin.categories', [
            'categories' => \LyneTechnologies\Larablog\Models\PostCategory::all()
        ]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        PostCategory::updateOrCreate(
            ['slug' => Str::slug($request->slug) ?: Str::slug($request->name)],
            ['name' => $request->name]
        );

        return redirect(route(config('larablog.routes.admin.categories.list.name')));
    }

    public function destroy($id)
    {
        PostCategory::destroy($id);
        return redirect(route(config('larablog.routes.admin.categories.list.name')));
    }

}
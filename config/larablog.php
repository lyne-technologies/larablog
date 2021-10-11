<?php
// config for LyneTechnologies/Larablog
return [
    'tinymce_key'   =>  env('TINYMCE_KEY', 'no-api-key'),
    'routes'    =>  [
        'admin' =>  [
            'create'    =>  [
                'name'  =>  'admin.blog.create',
                'url'  =>  '/admin/blog/create',
                'middleware'  =>  ['web'],
            ],
            'edit'    =>  [
                'name'  =>  'admin.blog.edit',
                'url'  =>  '/admin/blog/edit/{id}',
                'middleware'  =>  ['web'],
            ],
            'submit'    =>  [
                'name'   =>  'admin.blog.submit',
                'url'   =>  '/admin/blog/submit',
                'middleware'  =>  ['web'],
            ],
            'list'    =>  [
                'name'  =>  'admin.blog.list',
                'url'  =>  '/admin/blog/list',
                'middleware'  =>  ['web'],
            ],
            'categories'    =>  [
                'list'    =>  [
                    'name'  =>  'admin.blog.categories.list',
                    'url'  =>  '/admin/blog/categories/list',
                    'middleware'  =>  ['web'],
                ],
                'submit'    =>  [
                    'name'  =>  'admin.blog.categories.submit',
                    'url'  =>  '/admin/blog/categories/submit',
                    'middleware'  =>  ['web'],
                ],
                'destroy'    =>  [
                    'name'  =>  'admin.blog.categories.destroy',
                    'url'  =>  '/admin/blog/categories/{id}/destroy',
                    'middleware'  =>  ['web'],
                ],
            ],
        ],
        'list'    =>  [
            'name'  =>  'blog.list',
            'url'  =>  '/blog',
            'middleware'  =>  ['web'],
        ],
        'single'    =>  [
            'name'  =>  'blog.single',
            'url'  =>  '/blog/{slug}',
            'middleware'  =>  ['web'],
        ],
    ],
];

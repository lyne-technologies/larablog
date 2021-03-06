<?php
namespace LyneTechnologies\Larablog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    protected $casts = [
        'categories' => 'array'
    ];

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public function categories(){
        $data = [];
        foreach ($this->categories as $category){
            $data[] = PostCategory::where('id', $category)->first();
        }
        return $data;
    }


}

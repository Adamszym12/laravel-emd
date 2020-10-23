<?php

namespace App\Models;

use App\Http\Requests\UpdatePagePostRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
    ];

    public function update(array $attributes = [], array $options = [])
    {
        $count = [];
        foreach ($attributes as $section) {
            if (array_key_exists('images', $section)){
                foreach ($section['images'] as $image) {
                    $asd = "/storage/avatars/".basename(Storage::disk('local')->putFile('/public/home_images', $image));
                    array_push($count, $image);
                }
            }
            return $count;
        }
    }


}

<?php

namespace App\Models;

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
        foreach ($attributes as $attributeKey => $section) {
            if (array_key_exists('images', $section)){
                foreach ($section['images'] as $sectionKey => $image) {
                    $attributes[$attributeKey]['images'][$sectionKey] = "/storage/home_images/".basename(Storage::disk('local')->putFile('/public/home_images', $image));
                }
            }
        }
        $this->content = json_encode($attributes);
    }


}

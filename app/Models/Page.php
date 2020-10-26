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

    public function updatePage(array $attributes = [])
    {
        $newImagesArray = [];
        $currentContent = json_decode($this->content);
        foreach ($attributes as $attributeKey => $section) {
            if (array_key_exists('images', $section)) {
                foreach ($section['images'] as $sectionKey => $image) {
                    //delete images
                    Storage::disk()->delete('public/home_images/'. basename($currentContent->$attributeKey->images->$sectionKey));
                    $attributes[$attributeKey]['images'][$sectionKey] = "/storage/home_images/" . basename(Storage::disk('local')->putFile('/public/home_images', $image));
                }
            }
        }
        $this->content = json_encode(array_replace_recursive(json_decode($this->content, true), $attributes));
    }

    public function getContent()
    {
        return json_decode($this->content);
    }


}

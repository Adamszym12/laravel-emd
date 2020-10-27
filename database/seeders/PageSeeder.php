<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('pages')->insert([
                'name' => 'homepage',
                'content' => '{"section1":{"images":{"phone_image1":"\/storage\/home_images\/phone.jpeg"},"headers":{"header1":"New Age is an app landing page that will help you beautifully showcase your new mobile app, or anything else!"},"buttons":{"button1":"Start now for free!"}},"section2":{"headers":{"header1":"Discover what all the buzz is about!"},"paragraphs":{"paragraph1":"Our app is available on any mobile device! Download now to get started!"}},"section3":{"images":{"phone_image1":"\/storage\/home_images\/phone.jpeg"},"headers":{"header1":"Unlimited Features, Unlimited Fun","header2":"Device Mockups","header3":"Flexible Use","header4":"Free to Use","header5":"Open Source"},"paragraphs":{"paragraph1":"Check out what you can do with this app theme!","paragraph2":"Ready to use HTML\/CSS device mockups, no Photoshop required!","paragraph3":"Put an image, video, animation, or anything else in the screen!","paragraph4":"As always, this theme is free to download and use for any purpose!","paragraph5":"Since this theme is MIT licensed, you can use it commercially!"},"icons":{"icon1":"fas fa-braille","icon2":"fas fa-caret-square-down","icon3":"fas fa-chevron-down","icon4":"fas fa-blender-phone"}},"section4":{"headers":{"header1":"Stop waiting.\r\nStart building."},"buttons":{"button1":"Lets get started!"}},"section5":{"headers":{"header1":"We","header2":"new friends!"},"icons":{"icon1":"fas fa-birthday-cake"}}}',
            ]);
    }
}

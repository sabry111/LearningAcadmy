<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteContent::create([
            'name' => 'banner',
            'content' => json_encode([
                'title' => 'EVERY CHILD YEARNS TO LEARN',
                'sub_title' => 'Making Your Childs World Better',
                'desc' => "Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man",
            ]),

        ]);
        SiteContent::create([
            'name' => 'feature',
            'content' => json_encode([
                'title' => 'Awesome
                Feature',
                'desc' => "Set have great you male grass yielding an yielding first their you're have called the abundantly fruit were man",
            ]),

        ]);
        SiteContent::create([
            'name' => 'course',
            'content' => json_encode([
                'title' => 'POPULAR COURSES',
                'sub_title' => "Special Courses",
            ]),

        ]);
        SiteContent::create([
            'name' => 'newsletter',
            'content' => json_encode([
                'title' => 'Newsletter',
                'desc' => "Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.",
            ]),

        ]);
        SiteContent::create([
            'name' => 'logo_footer',
            'content' => json_encode([
                'small_desc' => 'But when shot real her. Chamber her one visite removal six sending himself boys scot exquisite existend an',
                'desc' => "But when shot real her hamber her",
            ]),

        ]);
        SiteContent::create([
            'name' => 'better future',
            'content' => json_encode([
                'title' => 'Better Future',
                'desc' => "Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male",
            ]),

        ]);
        SiteContent::create([
            'name' => 'qualified trainers',
            'content' => json_encode([
                'title' => 'Qualified Trainers',
                'desc' => "Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male",
            ]),

        ]);
        SiteContent::create([
            'name' => 'job oppurtunity',
            'content' => json_encode([
                'title' => 'Job Oppurtunity',
                'desc' => "Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male",
            ]),

        ]);
    }
}

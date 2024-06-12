<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([

            'name' => 'Learning Acadmy',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'city' => 'Mansoura',
            'address' => 'Jihan Street,Galaa, in front of the University gate',
            'phone' => '01020304050',
            'work_hours' => 'Sun To Thurs 9 AM To 5 PM',
            'email' => 'learn_acadmy@gmail.com',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13813.17420454178!2d31.342715049999995!3d30.057118999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1699139907757!5m2!1sen!2seg" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'facebook' => 'https://web.facebook.com/',
            'twitter' => ' https://twitter.com/',
            'instagram' => 'https://www.instagram.com/',

        ]);
    }
}

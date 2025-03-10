<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $judul = [
            'Selalu Dipuja-puja Bangsa'
        ];

        foreach ($judul as $j) {
            $slug = Str::slug($j);
            $slugOri = $slug;
            $count = 1;
            while(Post::where('slug', $slug)->exists()){
                $count++;
                $slug = $slugOri."-".$count;
            }
            Post::create([
                'title' => $j,
                'slug' => $slug,
                'description' => 'Deskripsi untuk ' . $j,
                'content' => 'konten untuk ' . $j,
                'status' => 'publish',
                'user_id' => '1'
            ]);
        } 
    }
}

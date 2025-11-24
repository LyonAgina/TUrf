<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class TurfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 10;
        $client = new Client();
        $accessKey = '1Ssc3csU6NFTeeTVwcFQfIlmTAuyG-tsSrgkzmda7mc';
        for ($i = 1; $i <= $count; $i++) {
            // Search Unsplash for sports/turf images
            $response = $client->get('https://api.unsplash.com/photos/random', [
                'query' => [
                    'query' => 'football field turf sports',
                    'orientation' => 'landscape',
                ],
                'headers' => [
                    'Authorization' => 'Client-ID ' . $accessKey,
                    'Accept-Version' => 'v1',
                ],
            ]);
            $imgUrl = null;
            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody(), true);
                $imgUrl = $data['urls']['regular'] ?? null;
            }
            $filename = "arena$i.jpg";
            $imgData = $imgUrl ? @file_get_contents($imgUrl) : false;
            if ($imgData !== false) {
                Storage::disk('public')->put($filename, $imgData);
            }
            \App\Models\Turf::factory()->create([
                'image' => $filename,
            ]);
        }
    }
}

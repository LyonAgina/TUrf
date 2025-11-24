<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Http;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turf>
 */
class TurfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sport = $this->faker->randomElement(['football', 'basketball', 'volleyball']);

        // Use Unsplash /search/photos for more variety
        $queries = [
            'football' => 'grass football field',
            'basketball' => 'indoor basketball court',
            'volleyball' => 'sand volleyball court',
        ];
        $image = 'arena1.jpg'; // fallback
        try {
            $response = \Illuminate\Support\Facades\Http::get('https://api.unsplash.com/search/photos', [
                'query' => $queries[$sport],
                'client_id' => 'Dy-k83Lm7k3L5u8a9xAJGcScf3nNWKptTsnLRdVIPaA',
                'orientation' => 'landscape',
                'per_page' => 10,
            ]);
            if ($response->ok() && isset($response['results']) && count($response['results']) > 0) {
                $images = array_map(fn($img) => $img['urls']['regular'] ?? null, $response['results']);
                $images = array_filter($images);
                if (count($images) > 0) {
                    $image = $this->faker->randomElement($images);
                }
            }
        } catch (\Exception $e) {
            // fallback remains
        }

        return [
            'name' => $this->faker->company . ' Turf',
            'description' => $this->faker->sentence(10),
            'pricePerHour' => $this->faker->randomFloat(2, 500, 5000),
            'ownerID' => \App\Models\User::factory(),
            'locationID' => \App\Models\Location::factory(),
            'image' => $image,
            'sport' => $sport,
        ];
    }
}

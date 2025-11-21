<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kenyanCities = [
            'Nairobi', 'Mombasa', 'Kisumu', 'Eldoret', 'Nakuru', 'Thika', 'Kitale', 'Malindi', 'Garissa', 'Nyeri', 'Machakos', 'Kericho', 'Meru', 'Kakamega', 'Bungoma', 'Naivasha', 'Embu', 'Isiolo', 'Migori', 'Homa Bay'
        ];
        $nairobiNeighborhoods = ['Westlands', 'Kilimani', 'Karen', 'Lavington', 'Eastleigh', 'South B', 'Runda', 'Parklands', 'Langata', 'Donholm', 'Buruburu', 'Kasarani', 'Embakasi', 'Muthaiga', 'Syokimau'];
        $otherNeighborhoods = ['CBD', 'Town Centre', 'Market Area', 'Estate', 'Suburb', 'Industrial Area', 'Beach Road', 'Golf Course', 'Milimani', 'Kondele', 'Railway', 'Airport', 'Hill', 'Plaza', 'Shopping Centre'];

        $city = $this->faker->randomElement($kenyanCities);
        $neighborhood = $city === 'Nairobi'
            ? $this->faker->randomElement($nairobiNeighborhoods)
            : $this->faker->randomElement($otherNeighborhoods);

        return [
            'city' => $city,
            'neighborhood' => $neighborhood,
            'address' => $this->faker->buildingNumber . ' ' . $neighborhood . ', ' . $city,
            'googleMapsLink' => 'https://maps.google.com/?q=' . urlencode($city . ' ' . $neighborhood),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Booking::class;
    public function definition(): array
    {
        // $checkin_date = $this->faker->dateTimeBetween('now', '+1 month');
        // $checkout_date = (clone $checkin_date)->modify('+3 days');

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'room_id' => Room::inRandomOrder()->first()->id,
            'checkin_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'checkout_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'guest_count' => $this->faker->numberBetween(1, 4),
            'total_price' => $this->faker->numberBetween(100, 1000),
            'status' => $this->faker->boolean(),
        ];
    }
}

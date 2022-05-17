<?php

namespace Database\Factories;

use App\Models\UserInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserInformation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //tạo user_id chạy ngẫu nhiên trong khoảng từ 1-3
            'user_id' => rand(1, 3),
            'dob' => $this->faker->date(),
            'phone_number' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->address
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Laptop;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaptopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Laptop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id'=>Item::factory()->create(),
            'ram'    =>'3g',
            'processor' => 'i9-9693k',
            'storage'   => '180g',
            'gpu'       =>  'gtx 1660',
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grn>
 */
class GrnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'=>'1',
            'specification'=>'950 x 50',
            'qty'=>'100',
            'unit'=>'kg',
            'rate_per_unit'=>'1000',
            'gst'=>'100',
            'amount'=>'100100'
        ];
    }
}

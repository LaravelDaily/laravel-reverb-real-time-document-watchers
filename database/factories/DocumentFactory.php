<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(5, true),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

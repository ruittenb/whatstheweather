<?php

namespace Database\Seeders;

use App\Models\Advice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * examples: \App\Models\User::factory(10)->create();
     *
     * DB::table('users')->insert([
     *     'name' => Str::random(10),
     *     'email' => Str::random(10).'@gmail.com',
     *     'password' => Hash::make('password'),
     * ]);
     *
     * @return void
     */
    public function run()
    {
        Advice::factory()->create([
            'sort_order' => 10,
            'temperature_min' => null,
            'temperature_max' => null,
            'wind_force_min' => 7,
            'wind_force_max' => null,
            'description' => 'Batten down the hatches!',
        ]);
        Advice::factory()->create([
            'sort_order' => 20,
            'temperature_min' => null,
            'temperature_max' => -10,
            'wind_force_min' => null,
            'wind_force_max' => null,
            'description' => 'Stay indoors. Turn up the heating.',
        ]);
        Advice::factory()->create([
            'sort_order' => 30,
            'temperature_min' => null,
            'temperature_max' => 0,
            'wind_force_min' => null,
            'wind_force_max' => null,
            'description' => 'Wear a warm coat and sweater.',
        ]);
        Advice::factory()->create([
            'sort_order' => 40,
            'temperature_min' => null,
            'temperature_max' => 10,
            'wind_force_min' => null,
            'wind_force_max' => null,
            'description' => 'Wear a warm sweater.',
        ]);
        Advice::factory()->create([
            'sort_order' => 50,
            'temperature_min' => null,
            'temperature_max' => 20,
            'wind_force_min' => null,
            'wind_force_max' => null,
            'description' => 'Bring an umbrella.',
        ]);
        Advice::factory()->create([
            'sort_order' => 60,
            'temperature_min' => 30,
            'temperature_max' => null,
            'wind_force_min' => null,
            'wind_force_max' => null,
            'description' => 'Organize a barbecue.',
        ]);
        Advice::factory()->create([
            'sort_order' => 70,
            'temperature_min' => 20,
            'temperature_max' => null,
            'wind_force_min' => null,
            'wind_force_max' => null,
            'description' => 'Go for a walk on the beach.',
        ]);

        // final record
        Advice::factory()->create([
            'sort_order' => 999_999_999,
            'temperature_min' => null,
            'temperature_max' => null,
            'wind_force_min' => null,
            'wind_force_max' => null,
            'description' => 'No specific advice.',
        ]);
    }
}

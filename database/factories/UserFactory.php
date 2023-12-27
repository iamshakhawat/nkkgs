<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fname = fake()->firstName();
        $lname = fake()->lastName();
        return [
            'user_id' => fake()->randomElement(['AD','ST','TE','GA']).'-'.fake()->numberBetween(1,10520),
            'name' => $fname.' '.$lname,
            'fname' => fake()->firstName(),
            'lname' => fake()->lastName(),
            'father_name' => fake()->name(),
            'mother_name' => fake()->name(),
            'parent_phone' => '01646362559',
            'parent_email' => fake()->safeEmail(),
            'emergency_contact' => '01646362559',
            'dob' => fake()->date('Y-m-d'),
            'roll' => fake()->numberBetween(1,10000),
            'class' => fake()->numberBetween(1,10),
            'section' => fake()->randomElement(['A','B','C','D','E','F']),
            'shift' => fake()->randomElement(['Day','Morning']),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => fake()->date('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
            'remember_token' => md5(uniqid()),
            'phone' => '01646362559',
            'gender' => fake()->randomElement(['Male','Female']),
            'religion' => fake()->randomElement(['Islam','Hindu','Buddah','Christian']),
            'nationality' => fake()->country(),
            'current_address' => fake()->address(),
            'parmanent_address' => fake()->address(),
            'blood_group' => fake()->bloodGroup(),
            'subject' => fake()->randomElement(['Bangla','English','Math','ICT','CSE']),
            'status' => fake()->numberBetween(0,1),
            'role' => fake()->randomElement(['admin','teacher','student','gurdian']),
            'experience' => fake()->text(),
            'qualification' => fake()->realText(),
            'about_me' => fake()->realText(200),
            'joining_date' => fake()->date('Y-m-d'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}

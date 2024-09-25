<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                "name" => "John Doe",
                "email" => "johndoe@example.com",
                "age" => 28,
                "location" => "New York, USA"
            ],
            [
                "name" => "Jane Smith",
                "email" => "janesmith@example.com",
                "age" => 32,
                "location" => "London, UK"
            ],
            [
                "name" => "David Brown",
                "email" => "davidbrown@example.com",
                "age" => 45,
                "location" => "Toronto, Canada"
            ],
            [
                "name" => "Emily Davis",
                "email" => "emilydavis@example.com",
                "age" => 25,
                "location" => "Sydney, Australia"
            ],
            [
                "name" => "Michael Wilson",
                "email" => "michaelwilson@example.com",
                "age" => 38,
                "location" => "Los Angeles, USA"
            ],
            [
                "name" => "Sophia Martinez",
                "email" => "sophiamartinez@example.com",
                "age" => 29,
                "location" => "Madrid, Spain"
            ],
            [
                "name" => "Chris Johnson",
                "email" => "chrisjohnson@example.com",
                "age" => 34,
                "location" => "Berlin, Germany"
            ],
            [
                "name" => "Olivia Taylor",
                "email" => "oliviataylor@example.com",
                "age" => 22,
                "location" => "Paris, France"
            ],
            [
                "name" => "Daniel Moore",
                "email" => "danielmoore@example.com",
                "age" => 40,
                "location" => "Rome, Italy"
            ],
            [
                "name" => "Sophia Anderson",
                "email" => "sophiaanderson@example.com",
                "age" => 26,
                "location" => "Amsterdam, Netherlands"
            ],
            [
                "name" => "Lucas Scott",
                "email" => "lucasscott@example.com",
                "age" => 31,
                "location" => "Chicago, USA"
            ],
            [
                "name" => "Charlotte White",
                "email" => "charlottewhite@example.com",
                "age" => 27,
                "location" => "Dublin, Ireland"
            ],
            [
                "name" => "Mason Green",
                "email" => "masongreen@example.com",
                "age" => 36,
                "location" => "Auckland, New Zealand"
            ],
            [
                "name" => "Amelia Harris",
                "email" => "ameliaharris@example.com",
                "age" => 23,
                "location" => "Vancouver, Canada"
            ],
            [
                "name" => "Ethan Young",
                "email" => "ethanyoung@example.com",
                "age" => 30,
                "location" => "Melbourne, Australia"
            ],
            [
                "name" => "Mia Clark",
                "email" => "miaclark@example.com",
                "age" => 28,
                "location" => "Cape Town, South Africa"
            ],
            [
                "name" => "William Hall",
                "email" => "williamhall@example.com",
                "age" => 33,
                "location" => "Hong Kong"
            ],
            [
                "name" => "Isabella Allen",
                "email" => "isabellaallen@example.com",
                "age" => 21,
                "location" => "Tokyo, Japan"
            ],
            [
                "name" => "James Baker",
                "email" => "jamesbaker@example.com",
                "age" => 37,
                "location" => "Seoul, South Korea"
            ],
            [
                "name" => "Ava Gonzalez",
                "email" => "avagonzalez@example.com",
                "age" => 35,
                "location" => "Mexico City, Mexico"
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'age' => $user['age'],
                'location' => $user['location'],
                'password' => bcrypt('defaultPassword'), // Set a default password
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

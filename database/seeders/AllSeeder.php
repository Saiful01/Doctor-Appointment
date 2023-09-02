<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Designation;
use App\Models\Hospital;
use App\Models\Specialist;
use App\Models\Status;
use App\Models\WeeklyDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            [
                'id' => 1,
                'name' => "Saturday",

            ],
            [
                'id' => 2,
                'name' => "Sunday",

            ],
            [
                'id' => 3,
                'name' => "Monday",

            ],
            [
                'id' => 4,
                'name' => "Tuesday",

            ],
            [
                'id' => 5,
                'name' => "Wednesday",

            ],
            [
                'id' => 6,
                'name' => "Thursday",

            ],
            [
                'id' => 7,
                'name' => "Friday",

            ],
        ];

        WeeklyDay::insert($days);


        $applicant = [
            [
                'id' => 1,
                'name' => 'Saiful Islam',
                'phone' => '01825013101',
                'address' => 'Mirpur-1, Dhaka',
                'blood_group' => 'O+',
                'gender' => 'Male',
                'age' => '27',
                'dob' => '1997-12-12',
                'password'       => bcrypt('password'),


            ],


        ];

        Applicant::insert($applicant);

        $hospital = [
            [
                'id' => 1,
                'title' => 'AMZ Hospital',


            ],

            [
                'id' => 2,
                'title' => 'Farazy Hospital',

            ],
        ];

        Hospital::insert($hospital);

        $designation = [
            [
                'id' => 1,
                'title' => 'Hepatobiliary and Pancreatic Surgeon',


            ],


        ];

        Designation::insert($designation);

        $specialist = [
            [
                'id' => 1,
                'title' => 'Liver Surgery',


            ],
            [
                'id' => 2,
                'title' => 'Gall Bladder Surgery',

            ],
            [
                'id' => 3,
                'title' => 'Pancreatic Surgery',

            ], [
                'id' => 4,
                'title' => 'Laparoscopic surgery',

            ], [
                'id' => 5,
                'title' => 'General Surgery',

            ],

        ];

        Specialist::insert($specialist);


        $status = [
            [
                'id' => 1,
                'title' => 'Submitted',


            ],

            [
                'id' => 2,
                'title' => 'Waiting',

            ],
            [
                'id' => 3,
                'title' => 'Done',

            ],
        ];

        Status::insert($status);
    }
}

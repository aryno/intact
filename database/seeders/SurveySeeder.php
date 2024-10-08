<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create();

        $surveyId = DB::table('surveys')->insertGetId([
            'app_id' => 1,
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(30),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $questions = [
            [
                'survey_id' => $surveyId,
                'question_text' => 'How satisfied are you with our service?',
                'question_type' => 'radio',
                'question_options' => json_encode(['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'survey_id' => $surveyId,
                'question_text' => 'What did you like about our service?',
                'question_type' => 'textbox',
                'question_options' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'survey_id' => $surveyId,
                'question_text' => 'Would you recommend us to a friend?',
                'question_type' => 'radio',
                'question_options' => json_encode(['Yes', 'No']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'survey_id' => $surveyId,
                'question_text' => 'What additional services would you like us to offer?',
                'question_type' => 'checkbox',
                'question_options' => json_encode(['Service A', 'Service B', 'Service C']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'survey_id' => $surveyId,
                'question_text' => 'Any Additional feedback?',
                'question_type' => 'textarea',
                'question_options' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('questions')->insert($questions);
        for ($i=0; $i < 7; $i++) {
            $questionIds = DB::table('questions')->where('survey_id', $surveyId)->pluck('id')->toArray();

            $answers = [
                $questionIds[0] => $faker->randomElement(['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied']),
                $questionIds[1] => $faker->sentence,
                $questionIds[2] => $faker->randomElement(['Yes', 'No']),
                $questionIds[3] => $faker->randomElements(['Service A', 'Service B', 'Service C'], 2),
                $questionIds[4] => $faker->paragraph,
            ];

            DB::table('responses')->insert([
                'identifier' => $faker->randomElement([null, uniqid()]),
                'survey_id' => $surveyId,
                'answers' => json_encode($answers),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

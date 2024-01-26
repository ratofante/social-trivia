<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_initial_questions = [
            [
                'question' => 'Who directed the movie "Inception"?',
                'answer' => 'Christopher Nolan',
                'opt_1' => 'Quentin Tarantino',
                'opt_2' => 'Martin Scorsese',
                'opt_3' => 'Steven Spielberg',
            ],
            [
                'question' => 'Which actor played the lead role in the "Pirates of the Caribbean" series?',
                'answer' => 'Johnny Depp',
                'opt_1' => 'Leonardo DiCaprio',
                'opt_2' => 'Brad Pitt',
                'opt_3' => 'Tom Cruise',
            ],
            [
                'question' => 'What is the highest-grossing film of all time (as of 2022)?',
                'answer' => 'Avatar',
                'opt_1' => 'Avengers: Endgame',
                'opt_2' => 'Titanic',
                'opt_3' => 'Star Wars: The Force Awakens',
            ],
            [
                'question' => 'Who won the Academy Award for Best Actress in 2019 for her role in "Judy"?',
                'answer' => 'Renée Zellweger',
                'opt_1' => 'Scarlett Johansson',
                'opt_2' => 'Charlize Theron',
                'opt_3' => 'Saoirse Ronan',
            ],
            [
                'question' => 'What is the name of the fictional African nation in the movie "Black Panther"?',
                'answer' => 'Wakanda',
                'opt_1' => 'Zamunda',
                'opt_2' => 'Genovia',
                'opt_3' => 'Latveria',
            ],
            [
                'question' => 'Who composed the music for the "Harry Potter" film series?',
                'answer' => 'John Williams',
                'opt_1' => 'Hans Zimmer',
                'opt_2' => 'Alan Silvestri',
                'opt_3' => 'James Horner',
            ],
            [
                'question' => 'Which film won the Academy Award for Best Picture in 2020?',
                'answer' => 'Parasite',
                'opt_1' => '1917',
                'opt_2' => 'Joker',
                'opt_3' => 'Once Upon a Time in Hollywood',
            ],
            [
                'question' => 'What is the name of the character played by Heath Ledger in "The Dark Knight"?',
                'answer' => 'The Joker',
                'opt_1' => 'Two-Face',
                'opt_2' => 'Bane',
                'opt_3' => 'Riddler',
            ],
            [
                'question' => 'Who directed the movie "The Shawshank Redemption"?',
                'answer' => 'Frank Darabont',
                'opt_1' => 'Steven Spielberg',
                'opt_2' => 'Quentin Tarantino',
                'opt_3' => 'Martin Scorsese',
            ],
            [
                'question' => 'What is the highest-grossing animated film of all time (as of 2022)?',
                'answer' => 'Frozen II',
                'opt_1' => 'The Lion King (2019)',
                'opt_2' => 'Toy Story 4',
                'opt_3' => 'Finding Dory',
            ],
        ];

        foreach ($admin_initial_questions as $q) {
            Question::create([
                'question' => $q['question'],
                'answer' => $q['answer'],
                'opt_1' => $q['opt_1'],
                'opt_2' => $q['opt_2'],
                'opt_3' => $q['opt_3'],
                'user_id' => 1,
            ]);
        }

        $user_test_questions = [
            [
                'question' => 'Who won the FIFA World Cup in 2018?',
                'answer' => 'France',
                'opt_1' => 'Germany',
                'opt_2' => 'Argentina',
                'opt_3' => 'Brazil',
            ],
            [
                'question' => 'Who is the all-time top scorer in NBA history?',
                'answer' => 'Kareem Abdul-Jabbar',
                'opt_1' => 'LeBron James',
                'opt_2' => 'Michael Jordan',
                'opt_3' => 'Kobe Bryant',
            ],
            [
                'question' => 'Which city hosted the 2016 Summer Olympics?',
                'answer' => 'Rio de Janeiro',
                'opt_1' => 'Tokyo',
                'opt_2' => 'Beijing',
                'opt_3' => 'London',
            ],
            [
                'question' => 'Who is known as the "King of Pop"?',
                'answer' => 'Michael Jackson',
                'opt_1' => 'Elvis Presley',
                'opt_2' => 'Prince',
                'opt_3' => 'David Bowie',
            ],
            [
                'question' => 'Which band performed the halftime show at Super Bowl LIV?',
                'answer' => 'Shakira and Jennifer Lopez',
                'opt_1' => 'Coldplay',
                'opt_2' => 'Maroon 5',
                'opt_3' => 'Bruno Mars',
            ],
        ];

        foreach($user_test_questions as $q) {
            Question::create([
                'question' => $q['question'],
                'answer' => $q['answer'],
                'opt_1' => $q['opt_1'],
                'opt_2' => $q['opt_2'],
                'opt_3' => $q['opt_3'],
                'user_id' => 2,
            ]);
        };
    }
}

<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class TestDataSeeder extends Seeder
{
    protected $timelineItemsNumber = 5;
    protected $feedbacksNumber = 20;
    protected $portfolioItemsNumber = 5;
    protected $portfolioCommentsNumber = 30;
    protected $timelineRelatedSkillsNumber = 30;
    protected $portfolioRelatedSkillsNumber = 30;
    protected $skills = [
        'Laravel', 'PHP', 'JavaScript',
        'MySQL', 'HTML', 'CSS',
        'Symfony', 'Doctrine', 'JQuery'
    ];

    protected $timelineTypes = [
        'work', 'education'
    ];

    public function run(Generator $faker)
    {
        $faker->addProvider(new \Faker\Provider\Image($faker));
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        $faker->addProvider(new \Faker\Provider\Internet($faker));

        DB::table('users')->insert([
            'name' => 'Illya Kazmirchuk',
            'birthdate' => new DateTime('1994-08-31'),
            'email' => 'Razo412@gmail.com',
            'login' => 'Mibert',
            'password' => bcrypt('1234qwer'),
            'location' => 'Kiev, Ukraine',
            'linked_in' => 'some LinkedIn URL',
            'skype' => 'Some Skype',
            'about_text' => $faker->text(700),
            'photo' => '/img/photo.png',
            'created_at' => new DateTime("now")
        ]);

        foreach ($this->skills as $skill) {
            DB::table('skills')->insert([
                'name' => $skill,
                'mastery_in_percent' => rand(50, 95),
                'icon_path' => '/img/icons/' . strtolower($skill) . '.png'
            ]);
        }

        for ($i = 1; $i <= $this->feedbacksNumber; $i++) {
            DB::table('feedbacks')->insert([
                'username' => $faker->name(),
                'email' => $faker->email(),
                'subject' => $faker->text(rand(15, 25)),
                'text' => $faker->text(rand(200, 500)),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now')
            ]);
        }

        for ($i = 1; $i <= $this->portfolioItemsNumber; $i++) {
            DB::table('portfolio_items')->insert([
                'title' => $faker->text(rand(15, 25)),
                'content' => $faker->text(rand(700, 2500)),
                'preview_img' => $faker->imageUrl('640', '480', 'business'),
                'created_at' => $faker->dateTimeBetween('-2 years', '-6 months')
            ]);
        }

        for ($i = 1; $i <= $this->portfolioCommentsNumber; $i++) {
            DB::table('portfolio_comments')->insert([
                'portfolio_item_id' => rand(1, $this->portfolioItemsNumber),
                'username' => $faker->name(),
                'text' => $faker->text(rand(100, 700)),
                'created_at' => $faker->dateTimeBetween('-6 months', 'now')
            ]);
        }


        foreach ($this->timelineTypes as $timelineType) {
            $previousItemEndDate = null;

            for ($i = 1; $i <= $this->timelineItemsNumber; $i++) {
                if ($previousItemEndDate && $previousItemEndDate instanceof DateTime) {
                    $startDate = new DateTime($previousItemEndDate->format('Y-m-d'));
                    $startDate->modify('-' . rand(2,10) . 'months');
                } else {
                    $startDate = new DateTime('-' . rand(2, 10) . ' months');
                }

                DB::table('timeline_items')->insert([
                    'type' => $timelineType,
                    'title' => $faker->text(rand(15, 25)),
                    'text' => $faker->text(rand(70, 150)),
                    'start_date' => $startDate,
                    'end_date' => $previousItemEndDate
                ]);

                $previousItemEndDate = $startDate;
            }
        }

        for($i = 1; $i <= $this->timelineRelatedSkillsNumber; $i++) {
            DB::table('skill_timeline_item')->insert([
                'skill_id' => rand(1, count($this->skills)),
                'timeline_item_id' => rand(1, $this->timelineItemsNumber)
            ]);
        }

        for($i = 1; $i <= $this->portfolioRelatedSkillsNumber; $i++) {
            DB::table('skill_portfolio_item')->insert([
                'skill_id' => rand(1, count($this->skills)),
                'portfolio_item_id' => rand(1, $this->portfolioItemsNumber)
            ]);
        }
    }
}

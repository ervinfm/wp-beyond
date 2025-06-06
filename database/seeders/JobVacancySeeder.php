<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class JobVacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitles = [
            'Software Engineer (Backend)', 'Frontend Developer', 'Full-stack Web Developer', 'UI/UX Designer',
            'Product Manager', 'Digital Marketing Specialist', 'Content Writer', 'SEO Specialist',
            'Data Analyst', 'DevOps Engineer', 'Mobile App Developer (iOS)', 'Mobile App Developer (Android)',
            'IT Support Specialist', 'Network Administrator', 'System Analyst', 'Quality Assurance Engineer',
            'Human Resources Manager', 'Account Executive', 'Sales Manager', 'Graphic Designer',
            'Project Manager', 'Business Development Manager', 'Financial Analyst', 'Customer Service Representative',
            'Operations Manager', 'Social Media Manager', 'Data Scientist', 'Cybersecurity Analyst',
            'Database Administrator', 'Scrum Master'
        ];

        $locations = [
            'Jakarta', 'Surabaya','Bandung','Tangerang','Yogyakarta','Surakarta','Semarang','Malang',
            'Medan','Palembang','Padang','Lampung','Bangka',
        ];
        $types = ['Full-time', 'Part-time', 'Contract', 'Internship'];

        for ($i = 0; $i < 30; $i++) {
            $title = $jobTitles[$i];
            $location = $locations[array_rand($locations)];
            $type = $types[array_rand($types)];
            $now = Carbon::now();

            DB::table('job_vacancies')->insert([
                'title' => $title,
                'slug' => Str::slug($title . '-' . uniqid()),
                'location' => $location,
                'type' => $type,
                'description' => "We are looking for a talented and passionate {$title} to join our dynamic team. In this role, you will be responsible for developing and maintaining our core products, working closely with a team of dedicated professionals to deliver high-quality solutions. If you are a problem-solver with a strong passion for technology and a desire to make a significant impact, we would love to hear from you.",
                'responsibilities' => json_encode([
                    'Collaborate with cross-functional teams to define, design, and ship new features.',
                    'Write clean, maintainable, and efficient code.',
                    'Troubleshoot, debug and upgrade existing systems.',
                    'Participate in code reviews to maintain high-quality code standards.',
                    'Ensure the best possible performance, quality, and responsiveness of applications.',
                ]),
                'qualifications' => json_encode([
                    'Bachelor\'s degree in Computer Science or related field, or equivalent practical experience.',
                    'Proven work experience as a ' . $title . '.',
                    'Strong understanding of object-oriented programming.',
                    'Excellent problem-solving skills and attention to detail.',
                    'Good communication skills and ability to work in a team.',
                ]),
                'closing_date' => $now->addDays(rand(15, 60))->toDateString(),
                'is_active' => (bool)rand(0, 1),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
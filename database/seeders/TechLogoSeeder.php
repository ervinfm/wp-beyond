<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TechnologyLogo;

class TechLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            // Backend Frameworks & Languages
            ['name' => 'Laravel', 'logo_path' => 'laravel.png', 'description' => 'PHP framework for web artisans.', 'website_url' => 'https://laravel.com/', 'display_order' => 1, 'is_active' => true],
            ['name' => 'Node.js', 'logo_path' => 'nodejs.png', 'description' => 'JavaScript runtime built on Chrome\'s V8 JavaScript engine.', 'website_url' => 'https://nodejs.org/en/', 'display_order' => 2, 'is_active' => true],
            ['name' => 'Express.js', 'logo_path' => 'expressjs.png', 'description' => 'Fast, unopinionated, minimalist web framework for Node.js.', 'website_url' => 'https://expressjs.com/', 'display_order' => 3, 'is_active' => true],
            ['name' => 'Django', 'logo_path' => 'django.png', 'description' => 'The web framework for perfectionists with deadlines.', 'website_url' => 'https://www.djangoproject.com/', 'display_order' => 4, 'is_active' => true],
            ['name' => 'Ruby on Rails', 'logo_path' => 'rubyonrails.png', 'description' => 'A web-application framework that includes everything needed to create database-backed web applications.', 'website_url' => 'https://rubyonrails.org/', 'display_order' => 5, 'is_active' => true],
            ['name' => 'Spring Boot', 'logo_path' => 'springboot.png', 'description' => 'Framework that makes it easy to create stand-alone, production-grade Spring based applications.', 'website_url' => 'https://spring.io/projects/spring-boot/', 'display_order' => 6, 'is_active' => true],
            ['name' => 'ASP.NET Core', 'logo_path' => 'aspnetcore.png', 'description' => 'Open-source and cross-platform framework for building modern, cloud-based, internet-connected applications.', 'website_url' => 'https://dotnet.microsoft.com/apps/aspnet', 'display_order' => 7, 'is_active' => true],
            ['name' => 'Go', 'logo_path' => 'go.png', 'description' => 'Open source programming language that makes it easy to build simple, reliable, and efficient software.', 'website_url' => 'https://go.dev/', 'display_order' => 8, 'is_active' => true],

            // Frontend Frameworks & Libraries
            ['name' => 'React', 'logo_path' => 'react.png', 'description' => 'A JavaScript library for building user interfaces.', 'website_url' => 'https://react.dev/', 'display_order' => 9, 'is_active' => true],
            ['name' => 'Angular', 'logo_path' => 'angular.png', 'description' => 'A platform and framework for building single-page client applications using HTML and TypeScript.', 'website_url' => 'https://angular.io/', 'display_order' => 10, 'is_active' => true],
            ['name' => 'Vue.js', 'logo_path' => 'vuejs.png', 'description' => 'The Progressive JavaScript Framework.', 'website_url' => 'https://vuejs.org/', 'display_order' => 11, 'is_active' => true],
            ['name' => 'Svelte', 'logo_path' => 'svelte.png', 'description' => 'Cybernetically enhanced web apps.', 'website_url' => 'https://svelte.dev/', 'display_order' => 12, 'is_active' => true],
            ['name' => 'jQuery', 'logo_path' => 'jquery.png', 'description' => 'A fast, small, and feature-rich JavaScript library.', 'website_url' => 'https://jquery.com/', 'display_order' => 13, 'is_active' => true],
            ['name' => 'Bootstrap', 'logo_path' => 'bootstrap.png', 'description' => 'The most popular HTML, CSS, and JS library in the world.', 'website_url' => 'https://getbootstrap.com/', 'display_order' => 14, 'is_active' => true],
            ['name' => 'Tailwind CSS', 'logo_path' => 'tailwindcss.png', 'description' => 'A utility-first CSS framework for rapidly building custom designs.', 'website_url' => 'https://tailwindcss.com/', 'display_order' => 15, 'is_active' => true],

            // Databases
            ['name' => 'MySQL', 'logo_path' => 'mysql.png', 'description' => 'The world\'s most popular open source database.', 'website_url' => 'https://www.mysql.com/', 'display_order' => 16, 'is_active' => true],
            ['name' => 'PostgreSQL', 'logo_path' => 'postgresql.png', 'description' => 'The world\'s most advanced open source relational database.', 'website_url' => 'https://www.postgresql.org/', 'display_order' => 17, 'is_active' => true],
            ['name' => 'MongoDB', 'logo_path' => 'mongodb.png', 'description' => 'A general purpose, document-based, distributed database.', 'website_url' => 'https://www.mongodb.com/', 'display_order' => 18, 'is_active' => true],
            ['name' => 'Redis', 'logo_path' => 'redis.png', 'description' => 'An open source, in-memory data structure store.', 'website_url' => 'https://redis.io/', 'display_order' => 19, 'is_active' => true],
            ['name' => 'SQLite', 'logo_path' => 'sqlite.png', 'description' => 'A C-language library that implements a small, fast, self-contained, high-reliability, full-featured, SQL database engine.', 'website_url' => 'https://www.sqlite.org/index.html', 'display_order' => 20, 'is_active' => true],

            // DevOps & Cloud
            ['name' => 'Docker', 'logo_path' => 'docker.png', 'description' => 'Platform for developers and sysadmins to develop, deploy, and run applications with containers.', 'website_url' => 'https://www.docker.com/', 'display_order' => 21, 'is_active' => true],
            ['name' => 'Kubernetes', 'logo_path' => 'kubernetes.png', 'description' => 'An open-source system for automating deployment, scaling, and management of containerized applications.', 'website_url' => 'https://kubernetes.io/', 'display_order' => 22, 'is_active' => true],
            ['name' => 'AWS', 'logo_path' => 'aws.png', 'description' => 'Amazon Web Services (AWS) is the world most comprehensive and broadly adopted cloud.', 'website_url' => 'https://aws.amazon.com/', 'display_order' => 23, 'is_active' => true],
            ['name' => 'Azure', 'logo_path' => 'azure.png', 'description' => 'Microsoft Azure is a cloud computing service operated by Microsoft.', 'website_url' => 'https://azure.microsoft.com/', 'display_order' => 24, 'is_active' => true],
            ['name' => 'Google Cloud', 'logo_path' => 'googlecloud.png', 'description' => 'A suite of cloud computing services that runs on the same infrastructure that Google uses internally.', 'website_url' => 'https://cloud.google.com/', 'display_order' => 25, 'is_active' => true],

            // Mobile Development
            ['name' => 'Flutter', 'logo_path' => 'flutter.png', 'description' => 'Google UI toolkit for building natively compiled applications for mobile, web, and desktop from a single codebase.', 'website_url' => 'https://flutter.dev/', 'display_order' => 26, 'is_active' => true],
            ['name' => 'React Native', 'logo_path' => 'reactnative.png', 'description' => 'A JavaScript framework for writing real, natively rendering mobile applications.', 'website_url' => 'https://reactnative.dev/', 'display_order' => 27, 'is_active' => true],
            ['name' => 'Kotlin', 'logo_path' => 'kotlin.png', 'description' => 'A modern programming language that makes developers happier.', 'website_url' => 'https://kotlinlang.org/', 'display_order' => 28, 'is_active' => true],
            ['name' => 'Swift', 'logo_path' => 'swift.png', 'description' => 'A powerful and intuitive programming language for macOS, iOS, watchOS, tvOS and beyond.', 'website_url' => 'https://www.swift.org/', 'display_order' => 29, 'is_active' => true],
            ['name' => 'Xamarin', 'logo_path' => 'xamarin.png', 'description' => 'An open-source framework for building modern and performant applications for iOS, Android, and Windows with .NET.', 'website_url' => 'https://dotnet.microsoft.com/apps/xamarin', 'display_order' => 30, 'is_active' => true],
        ];

        foreach ($technologies as $tech) {
            TechnologyLogo::create($tech);
        }
    }
}

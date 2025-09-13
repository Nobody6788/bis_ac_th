<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContentSection;

class ContentSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contentSections = [
            [
                'section_key' => 'hero.title.inspiring',
                'section_name' => 'Hero Title - Inspiring',
                'content' => 'Inspiring',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 1,
                'is_active' => true,
                'metadata' => ['translate_key' => 'hero.title.inspiring']
            ],
            [
                'section_key' => 'hero.title.excellence',
                'section_name' => 'Hero Title - Excellence',
                'content' => 'Excellence',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 2,
                'is_active' => true,
                'metadata' => ['translate_key' => 'hero.title.excellence']
            ],
            [
                'section_key' => 'hero.title.nurturing',
                'section_name' => 'Hero Title - Nurturing',
                'content' => 'Nurturing',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 3,
                'is_active' => true,
                'metadata' => ['translate_key' => 'hero.title.nurturing']
            ],
            [
                'section_key' => 'hero.title.citizens',
                'section_name' => 'Hero Title - Global Citizens',
                'content' => 'Global Citizens',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 4,
                'is_active' => true,
                'metadata' => ['translate_key' => 'hero.title.citizens']
            ],
            [
                'section_key' => 'hero.description',
                'section_name' => 'Hero Description',
                'content' => 'At Boston International School Chiangmai, we empower students to become innovative thinkers, compassionate leaders, and responsible global citizens through world-class education.',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 5,
                'is_active' => true,
                'metadata' => ['translate_key' => 'hero.description']
            ],
            [
                'section_key' => 'programs.title',
                'section_name' => 'Programs Section Title',
                'content' => 'Boston International School Chiangmai Features',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 10,
                'is_active' => true,
                'metadata' => ['translate_key' => 'programs.title']
            ],
            [
                'section_key' => 'programs.subtitle',
                'section_name' => 'Programs Section Subtitle',
                'content' => 'Our comprehensive programs and innovative approach to education prepare students for success in an ever-changing global landscape.',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 11,
                'is_active' => true,
                'metadata' => ['translate_key' => 'programs.subtitle']
            ],
            [
                'section_key' => 'about.title',
                'section_name' => 'About Section Title',
                'content' => 'What is Boston International School Chiangmai?',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 20,
                'is_active' => true,
                'metadata' => ['translate_key' => 'about.title']
            ],
            [
                'section_key' => 'about.desc1',
                'section_name' => 'About Description 1',
                'content' => 'Founded in 1999, Boston International School Chiangmai has been at the forefront of innovative education, nurturing students from over 40 nationalities to become confident, creative, and caring global citizens.',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 21,
                'is_active' => true,
                'metadata' => ['translate_key' => 'about.desc1']
            ],
            [
                'section_key' => 'about.desc2',
                'section_name' => 'About Description 2',
                'content' => 'Our comprehensive curriculum combines the best of international educational practices with local cultural understanding, preparing students for success in an interconnected world.',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 22,
                'is_active' => true,
                'metadata' => ['translate_key' => 'about.desc2']
            ],
            [
                'section_key' => 'contact.title',
                'section_name' => 'Contact Section Title',
                'content' => 'Get in Touch',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 30,
                'is_active' => true,
                'metadata' => ['translate_key' => 'contact.title']
            ],
            [
                'section_key' => 'contact.subtitle',
                'section_name' => 'Contact Section Subtitle',
                'content' => 'Ready to start your journey with Boston International School Chiangmai? Contact our admissions team.',
                'content_type' => 'text',
                'page' => 'homepage',
                'order' => 31,
                'is_active' => true,
                'metadata' => ['translate_key' => 'contact.subtitle']
            ]
        ];

        foreach ($contentSections as $section) {
            ContentSection::create($section);
        }
    }
}

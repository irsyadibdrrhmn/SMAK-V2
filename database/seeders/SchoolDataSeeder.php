<?php

namespace Database\Seeders;

use App\Models\SchoolProfile;
use App\Models\Announcement;
use App\Models\SchoolAchievement;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SchoolDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create School Profile
        SchoolProfile::create([
            'school_name' => 'SMAK Seminari Yohanes',
            'tagline' => 'Building character, faith, and excellence.',
            'principal_name' => 'Dr. Yohanes Hartanto',
            'logo' => null,
            'principal_photo' => null,
            'history' => 'SMAK Seminari Yohanes was founded in 1985 with a vision to provide quality Catholic education. Over the decades, we have grown into one of the leading educational institutions in the region, dedicated to nurturing well-rounded individuals with strong moral values and academic excellence.',
            'vision' => 'To develop globally competitive individuals with strong faith, character, and commitment to serving the community.',
            'mission' => 'We are committed to providing comprehensive education that integrates academic excellence with moral and spiritual development. We foster critical thinking, creativity, and leadership skills in our students while maintaining Catholic values and social responsibility.',
            'address' => 'Jl. Seminari No. 42, Jakarta, Indonesia',
            'phone' => '+62-21-123-4567',
            'email' => 'info@smakseminari.edu',
            'maps_embed' => null,
        ]);

        // Create Announcements
        Announcement::create([
            'title' => 'Academic Excellence Awards Ceremony',
            'content' => 'Join us for the Annual Academic Excellence Awards Ceremony on April 15, 2026. We will recognize outstanding students and staff who have made exceptional contributions to our school community.',
            'publish_at' => Carbon::now()->addDays(5),
            'is_published' => 'published',
        ]);

        Announcement::create([
            'title' => 'New Science Laboratory Opening',
            'content' => 'We are excited to announce the opening of our state-of-the-art Science Laboratory equipped with modern equipment and technology. This facility will enhance hands-on learning experiences for our students.',
            'publish_at' => Carbon::now()->addDays(3),
            'is_published' => 'published',
        ]);

        Announcement::create([
            'title' => 'Parent-Teacher Conference Scheduled',
            'content' => 'The bi-annual Parent-Teacher Conference will be held on April 22-24, 2026. Parents are encouraged to schedule appointments with their child\'s teachers to discuss academic progress and development.',
            'publish_at' => Carbon::now()->addDays(1),
            'is_published' => 'published',
        ]);

        // Create School Achievements
        SchoolAchievement::create([
            'title' => 'National Science Olympiad Championship',
            'description' => 'Our Science team won first place in the National Science Olympiad, showcasing excellence in physics, chemistry, and biology competitions.',
            'level' => 'National',
            'achievement_date' => Carbon::now()->subMonths(2),
            'photo' => null,
            'is_featured' => 'featured',
        ]);

        SchoolAchievement::create([
            'title' => 'International Debate Competition Winners',
            'description' => 'Our English Debate team emerged as champions in the Southeast Asian Debate Championship, competing against teams from 12 countries.',
            'level' => 'International',
            'achievement_date' => Carbon::now()->subMonths(3),
            'photo' => null,
            'is_featured' => 'featured',
        ]);

        SchoolAchievement::create([
            'title' => 'Environmental Conservation Initiative Award',
            'description' => 'Recognized by the Environmental Ministry for our school-wide sustainability programs and tree-planting initiatives that have made a significant impact on local communities.',
            'level' => 'National',
            'achievement_date' => Carbon::now()->subMonths(1),
            'photo' => null,
            'is_featured' => 'featured',
        ]);

        SchoolAchievement::create([
            'title' => 'Music Festival Grand Prize',
            'description' => 'Our school choir and orchestra performed at the National Music Festival and won the grand prize in the Youth Orchestra category.',
            'level' => 'National',
            'achievement_date' => Carbon::now()->subMonths(4),
            'photo' => null,
            'is_featured' => 'not_featured',
        ]);

        SchoolAchievement::create([
            'title' => 'Mathematics Olympiad Excellence',
            'description' => 'Five of our students qualified for the International Mathematics Olympiad after excelling in regional competitions.',
            'level' => 'International',
            'achievement_date' => Carbon::now()->subMonths(5),
            'photo' => null,
            'is_featured' => 'not_featured',
        ]);
    }
}

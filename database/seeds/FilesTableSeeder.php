<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\File;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalProfiles = Profile::count();

        // For each profile...
        for ($i = 1; $i <= $totalProfiles; $i++) {
            // Generate a file.
            factory(File::class)->create([
                'profile_id' => $i
            ]);
        }
    }
}

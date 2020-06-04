<?php

use Illuminate\Database\Seeder;
use App\Models\Checklist;

class ChecklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate a checklist.
        factory(Checklist::class, 600)->create();
    }
}

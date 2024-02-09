<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Disciple;
use App\Models\Process;
use App\Models\Team;
use App\Models\AgeGroup;
use App\Models\MemberStatus;
use App\Models\Module;
use App\Models\Tribe;



class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['name'=>'Active']);
        Status::create(['name'=>'Inactive']);

        Disciple::create(['name'=>'Attendee/Crowd']);
        Disciple::create(['name'=>'Andrew/Mentor']);
        Disciple::create(['name'=>'Peter/LG Leader']);
        Disciple::create(['name'=>'Paul/Coach']);
        Disciple::create(['name'=>'Pastor']);

        Process::create(['name'=>'Soul Winning']);
        Process::create(['name'=>'Soaking']);
        Process::create(['name'=>'Schooling']);
        Process::create(['name'=>'Graduated']);

        Team::create(['name'=>'Patience (Boys)']);
        Team::create(['name'=>'Patience (Girls)']);
        Team::create(['name'=>'Faithfulness']);
        Team::create(['name'=>'Gentleness']);
        Team::create(['name'=>'Love & Peace']);
        Team::create(['name'=>'Kindness']);

        AgeGroup::create(['name'=>'Youth']);
        AgeGroup::create(['name'=>'Young Adults']);
        AgeGroup::create(['name'=>'Kids']);

        MemberStatus::create(['name'=>'Active']);
        MemberStatus::create(['name'=>'Inactive']);
        MemberStatus::create(['name'=>'New']);

        Module::create(['name'=>'Puso Notebook Lessons']);
        Module::create(['name'=>'Life Start lessons']);
        Module::create(['name'=>'Lifestyle Lessons']);

        Tribe::create(['name'=>'Asher']);
        Tribe::create(['name'=>'Benjamin']);
        Tribe::create(['name'=>'Dan']);
        Tribe::create(['name'=>'Ephraim']);
        Tribe::create(['name'=>'Gad']);
        Tribe::create(['name'=>'Issachar']);
        Tribe::create(['name'=>'Judah']);
        Tribe::create(['name'=>'Manasseh']);
        Tribe::create(['name'=>'Naphtali']);
        Tribe::create(['name'=>'Simeon']);
        Tribe::create(['name'=>'Zebulun']);
        Tribe::create(['name'=>'Young Pro']);
        Tribe::create(['name'=>'Vergel']);

    }
}

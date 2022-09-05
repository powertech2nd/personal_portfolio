<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\InitialAdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countUser = User::where('name', 'admin')
            ->orWhere('email', env('MY_EMAIL'))
            ->count();
        if ($countUser > 0) {
            $this->command->info('Skipped because user admin/' . env('MY_EMAIL') . ' already exists');
            return;
        }

        $password = Str::random(17);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => env('MY_EMAIL'),
            'password' => bcrypt($password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $mailDetail  = [
            'title' => 'Initial admin account',
            'body' => 'Name : \'admin\' Email : \'' . env('MY_EMAIL') . '\' Password : \'' . $password . '\''
        ];
       
        Mail::to(env('MY_EMAIL'))->send(new InitialAdminUser($mailDetail));
        $this->command->info('Check account details at ' . env('MY_EMAIL'). ' don\'t forget to check APP_ENV and MAIL_ENV');
    }
}

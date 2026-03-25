<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-admin-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the admin password to use proper Bcrypt hashing';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', 'test@example.com')->first();

        if (!$user) {
            $this->error('Admin user not found!');
            return 1;
        }

        $user->password = Hash::make('password');
        $user->save();

        $this->info('Admin password has been reset successfully!');
        $this->line('Email: test@example.com');
        $this->line('Password: password');

        return 0;
    }
}

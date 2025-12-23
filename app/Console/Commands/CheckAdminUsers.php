<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CheckAdminUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:check {--fix : Fix missing admin users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check admin users and optionally fix missing admin users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking admin users...');
        $this->newLine();

        $users = User::all(['id', 'name', 'email', 'role']);

        if ($users->isEmpty()) {
            $this->warn('No users found in database!');
            
            if ($this->option('fix')) {
                if ($this->confirm('Do you want to create an admin user?', true)) {
                    $this->createAdminUser();
                }
            } else {
                $this->info('Run with --fix option to create admin user automatically.');
            }
            
            return Command::FAILURE;
        }

        $adminUsers = $users->filter(fn ($user) => $user->role === 'admin');
        $nonAdminUsers = $users->filter(fn ($user) => $user->role !== 'admin');

        // Display admin users
        if ($adminUsers->isNotEmpty()) {
            $this->info('✅ Admin Users Found:');
            $this->table(
                ['ID', 'Name', 'Email', 'Role'],
                $adminUsers->map(fn ($user) => [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->role ?? 'NULL',
                ])->toArray()
            );
        } else {
            $this->warn('❌ No admin users found!');
        }

        // Display non-admin users
        if ($nonAdminUsers->isNotEmpty()) {
            $this->newLine();
            $this->comment('Other Users:');
            $this->table(
                ['ID', 'Name', 'Email', 'Role'],
                $nonAdminUsers->map(fn ($user) => [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->role ?? 'NULL',
                ])->toArray()
            );
        }

        // Fix option
        if ($adminUsers->isEmpty() && $this->option('fix')) {
            $this->newLine();
            if ($this->confirm('No admin users found. Do you want to create one?', true)) {
                $this->createAdminUser();
            }
        } elseif ($adminUsers->isEmpty()) {
            $this->newLine();
            $this->info('💡 Tip: Run with --fix option to create admin user automatically.');
            $this->info('   Command: php artisan admin:check --fix');
        }

        return Command::SUCCESS;
    }

    /**
     * Create an admin user interactively.
     */
    protected function createAdminUser(): void
    {
        $this->newLine();
        $this->info('Creating admin user...');

        $name = $this->ask('Name', 'Administrator');
        $email = $this->ask('Email', 'admin@unforgetstuff.test');
        $password = $this->secret('Password') ?: 'password';

        // Check if email already exists
        if (User::where('email', $email)->exists()) {
            if ($this->confirm("User with email {$email} already exists. Update to admin?", true)) {
                $user = User::where('email', $email)->first();
                $user->role = 'admin';
                if ($password !== 'password') {
                    $user->password = Hash::make($password);
                }
                $user->save();
                $this->info("✅ User {$email} updated to admin!");
                return;
            } else {
                $this->warn('Cancelled.');
                return;
            }
        }

        // Create new admin user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin',
        ]);

        $this->info("✅ Admin user created successfully!");
        $this->info("   Email: {$email}");
        $this->info("   Password: {$password}");
    }
}

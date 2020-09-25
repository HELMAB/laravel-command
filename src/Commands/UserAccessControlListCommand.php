<?php

namespace Asorasoft\Command\Commands;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class UserAccessControlListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asorasoft:acl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A simple command to manage the access-control list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $options = [
            'process' => 0,
        ];
        $process = $this->choice('Which process?', [
            'List user',
            'List role',
            'List permission',
            'Change user\'s password',
            'Change E-mail address',
        ], $options['process']);

        switch ($process) {
            case 'List user':
                $this->listUser();
                break;
            case 'List role':
                $this->listRole();
                break;
            case 'List permission':
                $this->listPermission();
                break;
            case 'Change user\'s password':
                $this->changeUserPassword();
                break;
            case 'Change E-mail address':
                $this->changeEmailAddress();
                break;
        }
        $this->continueOrStop();
    }

    protected function listUser(): void
    {
        $headers = ['Name', 'Email'];
        $users = User::all(['name', 'email'])->toArray();
        $this->table($headers, $users);
    }

    protected function listRole(): void
    {
        $headers = ['Display', 'Name'];
        $roles = Role::all(['display_name_en', 'name'])->toArray();
        $this->table($headers, $roles);
    }

    protected function listPermission(): void
    {
        $headers = ['Display', 'Name'];
        $permissions = Permission::all(['display_name_en', 'name'])->toArray();
        $this->table($headers, $permissions);
    }

    protected function changeUserPassword()
    {
        $this->info('Change user\'s password');
    }

    protected function changeEmailAddress()
    {
        $this->info('Change E-mail address');
    }

    protected function continueOrStop()
    {
        if ($this->confirm('Do you wish to continue?')) {
            $this->handle();
        } else {
            $this->info('See you again!');
        }
    }
}

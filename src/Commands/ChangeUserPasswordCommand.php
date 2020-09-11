<?php

namespace Asorasoft\Command\Commands;

use App\User;
use Illuminate\Console\Command;

class ChangeUserPasswordCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asorasoft:user:change-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user password';

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
        return $this->changeUserPassword();
    }

    private function changeUserPassword()
    {
        $id = $this->ask('User ID');
        $user = \App\User::find($id);
        if (($user instanceof User)) {
            $this->table(['ID', 'Name', 'E-Mail Address'], [
                [$user->id, $user->name, $user->email]
            ]);
            $password = $this->secret('Enter new password');
            $user->update([
                'password' => bcrypt($password),
            ]);
            $this->info('The user password has been updated successfully.');
        }
        $this->decide();
    }

    private function decide()
    {
        if ($this->confirm('Do you wish to continue?')) {
            $this->changeUserPassword();
        } else {
            $this->info('See you again!');
        }
    }
}

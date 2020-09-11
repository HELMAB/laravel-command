<?php

namespace Asorasoft\Command\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ChangeUserEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asorasoft:user:change-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user email';

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
        $this->changeUserEmail();
    }

    private function changeUserEmail()
    {
        $id = $this->ask('User ID');
        $user = User::find($id);
        if ($user instanceof User) {
            $this->table(['ID', 'Name', 'E-Mail Address'], [
                [$user->id, $user->name, $user->email]
            ]);
            $email = $this->ask('Enter new email');
            $user->update([
                'email' => $email,
            ]);
            $this->info('The user email has been updated successfully.');
        }
        $this->decide();
    }

    private function decide()
    {
        if ($this->confirm('Do you wish to continue?')) {
            $this->changeUserEmail();
        } else {
            $this->info('See you again!');
        }
    }
}

<?php

namespace Fully\Console\Commands;

use Schema;
use Sentinel;
use Illuminate\Console\Command;

/**
 * Class AppCommand.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class AppCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Holds the user information.
     *
     * @var array
     */
    protected $userData = array(
        'first_name' => null,
        'last_name' => null,
        'email' => null,
        'password' => null,
    );

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // drop tables
        Schema::dropIfExists('articles');
        Schema::dropIfExists('articles_tags');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('form_posts');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('migrations');
        Schema::dropIfExists('news');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('photos');
        Schema::dropIfExists('photo_galleries');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('activations');
        Schema::dropIfExists('persistences');
        Schema::dropIfExists('reminders');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_users');
        Schema::dropIfExists('throttle');
        Schema::dropIfExists('users');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('maillist');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('logs');

        $this->comment('=====================================');
        $this->comment('');
        $this->info('  Step: 1');
        $this->comment('');
        $this->info('    Please follow the following');
        $this->info('    instructions to create your');
        $this->info('    default user.');
        $this->comment('');
        $this->comment('-------------------------------------');
        $this->comment('');

        // Let's ask the user some questions, shall we?
        $this->askUserFirstName();
        $this->askUserLastName();
        $this->askUserEmail();
        $this->askUserPassword();

        $this->comment('');
        $this->comment('');
        $this->comment('=====================================');
        $this->comment('');
        $this->info('  Step: 2');
        $this->comment('');
        $this->info('    Preparing your Application');
        $this->comment('');
        $this->comment('-------------------------------------');
        $this->comment('');

        // Generate the Application Encryption key
        $this->call('key:generate');

        // Create the migrations table
        $this->call('migrate:install');

        // Run the Migrations
        $this->call('migrate');

        // Create the default user and default groups.
        $this->sentinelRunner();

        // Seed the tables with dummy data
        $this->call('db:seed');
    }

    /**
     * Asks the user for the first name.
     */
    protected function askUserFirstName()
    {
        do {
            // Ask the user to input the first name
            $first_name = $this->ask('Please enter your first name: ');

            // Check if the first name is valid
            if ($first_name == '') {
                // Return an error message
                $this->error('Your first name is invalid. Please try again.');
            }

            // Store the user first name
            $this->userData['first_name'] = $first_name;
        } while (!$first_name);
    }

    /**
     * Asks the user for the last name.
     */
    protected function askUserLastName()
    {
        do {
            // Ask the user to input the last name
            $last_name = $this->ask('Please enter your last name: ');

            // Check if the last name is valid.
            if ($last_name == '') {
                // Return an error message
                $this->error('Your last name is invalid. Please try again.');
            }

            // Store the user last name
            $this->userData['last_name'] = $last_name;
        } while (!$last_name);
    }

    /**
     * Asks the user for the user email address.
     */
    protected function askUserEmail()
    {
        do {
            // Ask the user to input the email address
            $email = $this->ask('Please enter your user email: ');

            // Check if email is valid
            if ($email == '') {
                // Return an error message
                $this->error('Email is invalid. Please try again.');
            }

            // Store the email address
            $this->userData['email'] = $email;
        } while (!$email);
    }

    /**
     * Asks the user for the user password.
     */
    protected function askUserPassword()
    {
        do {
            // Ask the user to input the user password
            $password = $this->ask('Please enter your user password: ');

            // Check if email is valid
            if ($password == '') {
                // Return an error message
                $this->error('Password is invalid. Please try again.');
            }

            // Store the password
            $this->userData['password'] = $password;
        } while (!$password);
    }

    /**
     * Runs all the necessary Sentry commands.
     */
    protected function sentinelRunner()
    {
        // Create the default groups
        $this->sentinelCreateDefaultGroups();

        // Create the user
        $this->sentinelCreateUser();

        // Create dummy user
        $this->sentinelCreateDummyUser();
    }

    /**
     * Creates the default groups.
     */
    protected function sentinelCreateDefaultGroups()
    {
        // Create the admin group
        $this->role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'SuperAdmin',
            'slug' => 'superadmin',
        ]);

        // Show the success message.
        $this->comment('');
        $this->info('Admin group created successfully.');
    }

    /**
     * Create the user and associates the admin group to that user.
     */
    protected function sentinelCreateUser()
    {
        // Prepare the user data array.
        $data = array_merge($this->userData, array(
            'activated' => 1,
        ));

        $user = Sentinel::registerAndActivate($data);

        $this->role->users()->attach($user);

        // Show the success message
        $this->comment('');
        $this->info('Your user was created successfully.');
    }

    /**
     * Create a dummy user.
     */
    protected function sentinelCreateDummyUser()
    {
        $user = Sentinel::registerAndActivate(array(
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'activated' => 1,
        ));

        $this->role->users()->attach($user);

        // Show the success message
        $this->comment('');
        $this->info('Admin user was created successfully.');
        $this->comment('');
    }
}

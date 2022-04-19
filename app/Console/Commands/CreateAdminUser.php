<?php

namespace App\Console\Commands;

use App\Models\AdminUser;
use App\Models\Role;
use DB;
use Hash;
use Illuminate\Console\Command;

/**
 * Class CreateAdminUser
 *
 * @package App\Console\Commands
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class CreateAdminUser extends Command {

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'dev:create-admin-user {username} {email} {password}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creating admin user.';


	/**
	 * Command business logic.
	 */
	public function handle() {
		$username = $this->argument('username');
		$email = $this->argument('email');
		$password = $this->argument('password');

		$result = DB::table('admin_users')->where('username', '=', $username)->orWhere('email', '=', $email)->get();
		if (!$result->isEmpty()) {
			$this->error('The given email address or username is already taken.');
			return;
		}

		$userId = AdminUser::create([
			'username' => $username,
			'password' => Hash::make($password),
			'email' => $email,
			'is_active' => true
		]);

		$role = Role::findOrFail(1);
		$role->adminUsers()->attach($userId);

		$this->info('The user has been created.');
	}

}
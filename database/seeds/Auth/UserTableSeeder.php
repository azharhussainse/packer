<?php

use App\Models\Auth\User;
use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users');

        //Add the master administrator, user id of 1
        $users = [
            [
                'first_name' => 'Alan',
                'last_name' => '',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'profile_photo' => '2.jpg',
                'banner_photo' => 'banner.jpg',
                'confirmed' => true,
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'uuid' => Str::uuid(),
            ],
            [
                'first_name' => 'Justin',
                'last_name' => '',
                'username' => 'justin',
                'email' => 'executive@executive.com',
                'password' => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'profile_photo' => '3.jpg',
                'banner_photo' => 'banner2.jpg',
                'confirmed' => true,
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'uuid' => Str::uuid(),
            ],
            [
                'first_name' => 'Sanmi Faboya',
                'last_name' => '',
                'username' => 'SFsanmi',
                'email' => 'user@user.com',
                'password' => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'profile_photo' => '3.jpg',
                'banner_photo' => 'banner2.jpg',
                'confirmed' => true,
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'uuid' => Str::uuid(),
            ],
        ];

        DB::table('users')->insert($users);

        $this->enableForeignKeys();
    }
}

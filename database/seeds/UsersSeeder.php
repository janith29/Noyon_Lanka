<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users');

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin.noyonlanka@labs.com',
                'password' => bcrypt('894564124'),
                'active' => true,
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'usertype' => 'administrator'
             ]
           
           
        ];

        DB::table('users')->insert($users);

        $member = [
            [
                'name' => 'Admin',
                'nic' => '894564124',
                'mbr_pic' => '1member.jpeg',
                'contact' => '071134565',
                'email' => 'admin.noyonlanka@labs.com',
                'birthday' => '1986-06-05',
                'address' => 'Biyagama,sri lanka'
        ]
           
    ];
    DB::table('member')->insert($member);

    }
}

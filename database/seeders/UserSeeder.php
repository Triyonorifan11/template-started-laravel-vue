<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {

            $data = [
                [
                    'id' => 1,
                    'role_id' => 1,
                    'name' => 'Developer',
                    'username' => 'developer',
                    'password' => Hash::make(config('env.default_password')),
                    'email' => 'developer@template-web.id',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id' => 2,
                    'role_id' => 2,
                    'name' => 'Administrator',
                    'password' => Hash::make(config('env.default_password')),
                    'username' => 'admin',
                    'email' => 'administrator@template-web.id',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id' => 3,
                    'role_id' => 3,
                    'username' => 'superadmin',
                    'name' => 'Super Administrator',
                    'password' => Hash::make(config('env.default_password')),
                    'email' => config('env.primary_super_admin_email', 'superadministrator@template-web.id'),
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id' => 4,
                    'role_id' => 4,
                    'name' => 'Customer',
                    'username' => 'customer',
                    'password' => Hash::make(config('env.default_password')),
                    'email' => 'customer@template-web.id',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id' => 5,
                    'role_id' => 5,
                    'name' => 'Reviewer Admin',
                    'username' => 'reviewer',
                    'password' => Hash::make(config('env.default_password')),
                    'email' => 'reviewer@template-web.id',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ];

            foreach ($data as $key => $value) {
                User::updateOrInsert(['id' => $value['id']], [
                    'id' => $value['id'],
                    'role_id' => $value['role_id'],
                    'username' => strtolower($value['username']),
                    'name' => $value['name'],
                    'password' => $value['password'],
                    'email' => $value['email'],
                    'id_hash' => Str::uuid()->toString(),
                    'is_active' => true,
                    'created_at' => $value['created_at'],
                    'updated_at' => $value['updated_at'],
                ]);
            }

            $lastId = User::orderBy('id', 'desc')->first();
            if (!empty($lastId)) {
                $newLastId = $lastId->id + 1;
                DB::statement("ALTER SEQUENCE users_id_seq RESTART WITH {$newLastId}");
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }
}

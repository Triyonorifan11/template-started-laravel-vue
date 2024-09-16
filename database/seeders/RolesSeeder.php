<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RolesSeeder extends Seeder
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
                    'name' => 'Developer',
                    'slug' => 'developer',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 2,
                    'name' => 'Admin',
                    'slug' => 'admin',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 3,
                    'name' => 'Super Admin',
                    'slug' => 'super-admin',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 4,
                    'name' => 'Customer',
                    'slug' => 'customer',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 5,
                    'name' => 'Reviewer',
                    'slug' => 'reviewer',
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ];

            foreach ($data as $key => $value) {
                Roles::updateOrInsert(['slug' => $value['slug']], [
                    'id' => $value['id'],
                    'name' => $value['name'],
                    'slug' => $value['slug'],
                    'is_active' => $value['is_active'],
                    'id_hash' => Str::orderedUuid()->toString(),
                    'created_at' => $value['created_at'],
                    'updated_at' => $value['updated_at'],
                ]);
            }

            $lastId = Roles::orderBy('id', 'desc')->first();
            if (!empty($lastId)) {
                $newLastId = $lastId->id + 1;
                DB::statement("ALTER SEQUENCE roles_id_seq RESTART WITH $newLastId");
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }
}

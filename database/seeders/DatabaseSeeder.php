<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'categories',
        ]);
        try {
            \DB::beginTransaction();
            $this->call(CategorySeeder::class);
            \DB::commit();
        } catch (\Exception $exception){
            \DB::rollback();
            throw (new \Exception($exception));
        }
        // \App\Models\User::factory(10)->create();
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

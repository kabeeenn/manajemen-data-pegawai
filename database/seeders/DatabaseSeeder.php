<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Pegawai::factory()->create([
            'nama' => 'Kabin',
            'alamat' => 'Gang Mega 3 No. 3',
            'email' => 'kabin@gmail.com',
            'tanggal_lahir' => '1998-08-08',
            'unit_id' => Unit::factory()
        ]);

        Unit::factory(4)->create()->each(function ($unit) {
            Pegawai::factory(3)->create(['unit_id' => $unit->id]);
        });
    }
}

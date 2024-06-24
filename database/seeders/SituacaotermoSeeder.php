<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SituacaotermoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now();

        DB::table('situacao_termo')->insert([
            ['id' => 1, 'name' => 'Anexada', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['id' => 2, 'name' => 'Pendente', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['id' => 3, 'name' => 'Cancelada', 'created_at' => $timestamp, 'updated_at' => $timestamp],
        ]);
    }
}

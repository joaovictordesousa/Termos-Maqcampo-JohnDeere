<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuxaparelhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now();

        DB::table('auxaparelho')->insert([
            ['id' => 1, 'aparelho' => 'Notebook', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['id' => 2, 'aparelho' => 'Computador', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['id' => 3, 'aparelho' => 'Celular', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['id' => 4, 'aparelho' => 'Tablet', 'created_at' => $timestamp, 'updated_at' => $timestamp]
        ]);
    }
}

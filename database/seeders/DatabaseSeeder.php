<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('pokemons')->insert([
            ["name" => "Pikachu", "type" => "Electric", "hp" => 35, "status" => "captured"],
            ["name" => "Charmander", "type" => "Fire", "hp" => 39, "status" => "wild"],
            ["name" => "Squirtle", "type" => "Water", "hp" => 44, "status" => "captured"],
            ["name" => "Bulbasaur", "type" => "Grass", "hp" => 45, "status" => "wild"],
            ["name" => "Jigglypuff", "type" => "Fairy", "hp" => 95, "status" => "captured"],
            ["name" => "Meowth", "type" => "Normal", "hp" => 40, "status" => "wild"],
            ["name" => "Psyduck", "type" => "Water", "hp" => 52, "status" => "captured"],
            ["name" => "Machop", "type" => "Fighting", "hp" => 70, "status" => "wild"],
            ["name" => "Geodude", "type" => "Rock", "hp" => 60, "status" => "captured"],
            ["name" => "Eevee", "type" => "Normal", "hp" => 55, "status" => "wild"],
            ["name" => "Vulpix", "type" => "Fire", "hp" => 38, "status" => "captured"],
            ["name" => "Zubat", "type" => "Poison", "hp" => 40, "status" => "wild"],
            ["name" => "Oddish", "type" => "Grass", "hp" => 48, "status" => "captured"],
            ["name" => "Diglett", "type" => "Ground", "hp" => 25, "status" => "wild"],
            ["name" => "Abra", "type" => "Psychic", "hp" => 30, "status" => "captured"],
            ["name" => "Gastly", "type" => "Ghost", "hp" => 35, "status" => "wild"],
            ["name" => "Onix", "type" => "Rock", "hp" => 80, "status" => "captured"],
            ["name" => "Cubone", "type" => "Ground", "hp" => 50, "status" => "wild"],
            ["name" => "Rhyhorn", "type" => "Ground", "hp" => 90, "status" => "captured"],
            ["name" => "Magikarp", "type" => "Water", "hp" => 20, "status" => "wild"],
            ["name" => "Gyarados", "type" => "Water", "hp" => 95, "status" => "captured"],
            ["name" => "Lapras", "type" => "Water", "hp" => 100, "status" => "wild"],
            ["name" => "Ditto", "type" => "Normal", "hp" => 48, "status" => "captured"],
            ["name" => "Snorlax", "type" => "Normal", "hp" => 100, "status" => "wild"],
            ["name" => "Dratini", "type" => "Dragon", "hp" => 41, "status" => "captured"],
            ["name" => "Dragonair", "type" => "Dragon", "hp" => 60, "status" => "wild"],
            ["name" => "Dragonite", "type" => "Dragon", "hp" => 90, "status" => "captured"],
            ["name" => "Mewtwo", "type" => "Psychic", "hp" => 100, "status" => "wild"],
            ["name" => "Mew", "type" => "Psychic", "hp" => 88, "status" => "captured"],
            ["name" => "Articuno", "type" => "Ice", "hp" => 85, "status" => "wild"],
        ]);
    }
}

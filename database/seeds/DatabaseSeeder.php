<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AuthorSeeder::class,
            CoversSeeder::class,
            ChairSeeder::class,
            PaperSizesSeeder::class,
            MonthSeeder::class,
            TypeOfPublicationsSeeder::class,
            UsersSeeder::class,
            DisciplinesSeeder::class,
            PublicationsSeeder::class,
            AuthorsPublicationsSeeder::class,
            UsersAuthorsSeeder::class,
        ]);
    }
}

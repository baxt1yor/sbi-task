<?php

namespace Database\Seeders;

use App\Dto\MultiLanguageFiled;
use App\Models\Category;
use Illuminate\Database\Seeder;
use function collect;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryNames = collect([
            MultiLanguageFiled::fromArray([
                "ru" => "Смартфоны",
                "uz" => "Smartfonlar",
                "cyrl" => "Смартфонлар"
            ]),

            MultiLanguageFiled::fromArray([
                "ru" => "Зарядк",
                "uz" => "Зарядк",
                "cyrl" => "Зарядк"
            ]),

            MultiLanguageFiled::fromArray([
                "ru" => "Чехлы",
                "uz" => "Чехлы",
                "cyrl" => "Чехлы"
            ])
        ]);

        $categoryNames->each(fn (MultiLanguageFiled $categoryName) => Category::query()->create(['name' => $categoryName]));
    }
}

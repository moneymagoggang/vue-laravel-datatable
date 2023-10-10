<?php
namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        $categories = Category::factory(10)->create();
        $categories->each(function (Category $category) {
            $this->command->getOutput()->info(
                message: "Creating posts for category: [$category->name]",
            );
            $bar = $this->command->getOutput()->createProgressBar(100);
            for ($i = 0; $i < 1000; $i++) {
                $bar->advance();
                Post::factory()->create();
            }
            $bar->finish();
        });
    }
}

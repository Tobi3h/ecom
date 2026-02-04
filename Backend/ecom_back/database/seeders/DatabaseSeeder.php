<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles et permissions
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        // Créer 8 catégories
        $this->command->info('Creating categories...');
        $categories = Category::factory()->count(8)->create();
        $this->command->info('8 categories created!');

        // Créer 80 produits répartis sur les catégories
        $this->command->info('Creating products...');
        foreach ($categories as $category) {
            // Créer 10 produits par catégorie
            $products = Product::factory()
                ->count(10)
                ->forCategory($category)
                ->create();

            // Créer 3 images pour chaque produit
            foreach ($products as $product) {
                // Première image = image principale
                ProductImage::factory()
                    ->forProduct($product)
                    ->main()
                    ->create();

                // 2 autres images
                ProductImage::factory()
                    ->count(2)
                    ->forProduct($product)
                    ->create();
            }
        }
        $this->command->info('80 products with 240 images created!');

        // Créer un utilisateur de test (optionnel)
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}


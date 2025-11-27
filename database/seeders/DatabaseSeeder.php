<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Store;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\DeliveryPartner;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        $admin = User::create([
            'name' => 'المسؤول',
            'email' => 'admin@souqi.com',
            'phone' => '+966501234567',
            'password' => Hash::make('password123'),
            'type' => 'admin',
            'is_active' => true,
            'verified_at' => now(),
        ]);

        // Create Customers
        for ($i = 1; $i <= 3; $i++) {
            $customer = User::create([
                'name' => "عميل رقم $i",
                'email' => "customer$i@souqi.com",
                'phone' => '+96650123456' . $i,
                'password' => Hash::make('password123'),
                'type' => 'customer',
                'is_active' => true,
                'verified_at' => now(),
            ]);

            Customer::create([
                'user_id' => $customer->id,
                'wallet_balance' => 0,
                'loyalty_points' => 0,
                'total_spent' => 0,
                'total_orders' => 0,
            ]);
        }

        // Create Sellers and Stores
        for ($i = 1; $i <= 3; $i++) {
            $seller = User::create([
                'name' => "تاجر رقم $i",
                'email' => "seller$i@souqi.com",
                'phone' => '+96650234567' . $i,
                'password' => Hash::make('password123'),
                'type' => 'seller',
                'is_active' => true,
                'verified_at' => now(),
            ]);

            Store::create([
                'user_id' => $seller->id,
                'name' => "متجر $i",
                'slug' => "store-$i",
                'description' => "متجر متميز يوفر منتجات عالية الجودة $i",
                'phone' => '+96650234567' . $i,
                'address' => "الرياض - شارع البديعة $i",
                'city' => 'الرياض',
                'commercial_number' => '123456789' . $i,
                'rating' => 4.5,
                'is_active' => true,
            ]);
        }

        // Create Delivery Partners
        for ($i = 1; $i <= 2; $i++) {
            $delivery = User::create([
                'name' => "شركة توصيل $i",
                'email' => "delivery$i@souqi.com",
                'phone' => '+96650334567' . $i,
                'password' => Hash::make('password123'),
                'type' => 'delivery',
                'is_active' => true,
                'verified_at' => now(),
            ]);

            DeliveryPartner::create([
                'user_id' => $delivery->id,
                'company_name' => "شركة التوصيل السريع $i",
                'license_number' => "LIC123456$i",
                'vehicle_type' => 'دراجة نارية',
                'vehicle_plate' => "AB12345$i",
                'commission_percentage' => 10,
                'is_active' => true,
                'rating' => 4.7,
            ]);
        }

        // Create Categories
        $categories = [
            ['name_ar' => 'عالم الرجال', 'name_en' => 'Men\'s World'],
            ['name_ar' => 'عالم النساء', 'name_en' => 'Women\'s World'],
            ['name_ar' => 'عالم الأطفال', 'name_en' => 'Kids\'s World'],
            ['name_ar' => 'عالم المنزل', 'name_en' => 'Home World'],
            ['name_ar' => 'عالم التكنولوجيا', 'name_en' => 'Tech World'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name_ar' => $cat['name_ar'],
                'name_en' => $cat['name_en'],
                'slug' => str_replace(' ', '-', strtolower($cat['name_en'])),
                'is_active' => true,
            ]);
        }

        // Create Products
        $stores = Store::all();
        $categories = Category::all();

        $products = [
            ['name_ar' => 'قميص رجالي', 'name_en' => 'Men\'s Shirt', 'price' => 150, 'stock' => 50],
            ['name_ar' => 'بنطال جينز', 'name_en' => 'Jeans Pants', 'price' => 250, 'stock' => 30],
            ['name_ar' => 'فستان نسائي', 'name_en' => 'Women\'s Dress', 'price' => 350, 'stock' => 25],
            ['name_ar' => 'ملابس أطفال', 'name_en' => 'Kids Clothes', 'price' => 100, 'stock' => 40],
            ['name_ar' => 'سرير خشبي', 'name_en' => 'Wooden Bed', 'price' => 1500, 'stock' => 10],
            ['name_ar' => 'طاولة قهوة', 'name_en' => 'Coffee Table', 'price' => 800, 'stock' => 15],
        ];

        foreach ($products as $key => $product) {
            Product::create([
                'store_id' => $stores[$key % $stores->count()]->id,
                'category_id' => $categories[$key % $categories->count()]->id,
                'name_ar' => $product['name_ar'],
                'name_en' => $product['name_en'],
                'description_ar' => 'منتج عالي الجودة',
                'description_en' => 'High quality product',
                'price' => $product['price'],
                'original_price' => $product['price'] * 1.2,
                'stock' => $product['stock'],
                'sku' => 'SKU' . str_pad($key + 1, 6, '0', STR_PAD_LEFT),
                'rating' => 4.5,
                'is_active' => true,
            ]);
        }

        $this->command->info('Database seeded successfully!');
    }
}

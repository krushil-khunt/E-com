<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoriesList = [
            1 => 'Smart Phones',
            2 => 'Laptops',
            3 => 'Earbuds',
            4 => 'Smart Watches',
            5 => 'Tablets',
            6 => 'Mice',
            7 => 'Chargers',
            8 => 'Power Banks',
        ];

        foreach ($categoriesList as $id => $name) {
            \App\Models\Category::firstOrCreate(
                ['id' => $id],
                ['name' => $name]
            );
        }

        $products = [
            // ================= USER REQUESTED SPECIFIC PRODUCTS =================
            [
                'name' => 'iPhone 16 Pro',
                'brand' => 'Apple',
                'price' => 134900,
                'description' => 'Super-thin bezel display, A18 Pro chip, advanced thermal design, and a dedicated camera control button.',
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=600&q=80',
                'ram' => '8 GB',
                'storage' => '256 GB',
                'category_id' => 1
            ],
            [
                'name' => 'Samsung S23 Ultra',
                'brand' => 'Samsung',
                'price' => 124999,
                'description' => 'Snapdragon 8 Gen 2, dynamic 200MP camera system, integrated S Pen stylus, and unmatched digital zoom quality.',
                'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?auto=format&fit=crop&w=600&q=80',
                'ram' => '12 GB',
                'storage' => '256 GB',
                'category_id' => 1
            ],
            [
                'name' => 'OnePlus 12',
                'brand' => 'OnePlus',
                'price' => 64999,
                'description' => 'Snapdragon 8 Gen 3, Hasselblad mobile camera partnership, 100W SUPERVOOC charging, and 2K Oriental Display.',
                'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=600&q=80',
                'ram' => '16 GB',
                'storage' => '512 GB',
                'category_id' => 1
            ],
            [
                'name' => 'MacBook Pro M4',
                'brand' => 'Apple',
                'price' => 169900,
                'description' => 'Next-generation M4 architecture processor, Liquid Retina XDR screen, studio-quality mics, and up to 22h battery.',
                'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=600&q=80',
                'ram' => '16 GB',
                'storage' => '512 GB',
                'category_id' => 2
            ],
            [
                'name' => 'AirPods Pro',
                'brand' => 'Apple',
                'price' => 24900,
                'description' => 'Active Noise Cancellation, Adaptive Audio capabilities, custom acoustic fit, and spatial tracking.',
                'image' => 'https://images.unsplash.com/photo-1588449668338-d151688b3c4e?auto=format&fit=crop&w=600&q=80',
                'ram' => '-',
                'storage' => '-',
                'category_id' => 3
            ],

            // ================= ADDITIONAL REAL SEEDER PRODUCTS =================
            [
                'name' => 'Google Pixel 8 Pro',
                'brand' => 'Google',
                'price' => 106999,
                'description' => 'Google Tensor G3 chip, advanced AI photo/video editing tools, and the best-in-class Pixel Camera system.',
                'image' => 'https://images.unsplash.com/photo-1616348436168-de43ad0db179?q=80&w=600&auto=format&fit=crop',
                'ram' => '12 GB',
                'storage' => '128 GB',
                'category_id' => 1
            ],
            [
                'name' => 'Dell XPS 15',
                'brand' => 'Dell',
                'price' => 189999,
                'description' => 'Intel Core i9 processor, NVIDIA GeForce RTX 4060 graphics, and a stunning 4-sided InfinityEdge OLED display.',
                'image' => 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?q=80&w=600&auto=format&fit=crop',
                'ram' => '32 GB',
                'storage' => '1 TB',
                'category_id' => 2
            ],
            [
                'name' => 'Sony WF-1000XM5',
                'brand' => 'Sony',
                'price' => 23990,
                'description' => 'Industry-leading noise cancellation, Hi-Res Audio wireless, and exceptional call quality with bone conduction sensors.',
                'image' => 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop',
                'ram' => '-',
                'storage' => '-',
                'category_id' => 3
            ],
            [
                'name' => 'Apple Watch Series 9',
                'brand' => 'Apple',
                'price' => 41900,
                'description' => 'S9 SiP chip, double tap gesture control, bright Always-On Retina display, and carbon-neutral combinations.',
                'image' => 'https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?q=80&w=600&auto=format&fit=crop',
                'ram' => '1 GB',
                'storage' => '64 GB',
                'category_id' => 4
            ],
            [
                'name' => 'Samsung Galaxy Watch 6',
                'brand' => 'Samsung',
                'price' => 29999,
                'description' => 'Sleep tracking & coaching, body composition analysis (BIA), classic rotating bezel layout, and LTE support.',
                'image' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?q=80&w=600&auto=format&fit=crop',
                'ram' => '2 GB',
                'storage' => '16 GB',
                'category_id' => 4
            ],
            [
                'name' => 'Apple iPad Pro M4',
                'brand' => 'Apple',
                'price' => 99900,
                'description' => 'Breakthrough Tandem OLED display, Apple M4 chip, ultra-thin profile, and support for Apple Pencil Pro.',
                'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?q=80&w=600&auto=format&fit=crop',
                'ram' => '8 GB',
                'storage' => '256 GB',
                'category_id' => 5
            ],
            [
                'name' => 'Logitech MX Master 3S',
                'brand' => 'Logitech',
                'price' => 10995,
                'description' => 'Ergonomic wireless mouse, Quiet Click switches, 8K DPI tracking on any surface, and MagSpeed scroll wheel.',
                'image' => 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?q=80&w=600&auto=format&fit=crop',
                'ram' => '-',
                'storage' => '-',
                'category_id' => 6
            ],
            [
                'name' => 'Anker Prime 67W GaN Charger',
                'brand' => 'Anker',
                'price' => 3999,
                'description' => 'Compact GaN wall charger with 2 USB-C and 1 USB-A ports, safety monitoring, and optimal charge distribution.',
                'image' => 'https://images.unsplash.com/photo-1622445262465-2481c4574875?q=80&w=600&auto=format&fit=crop',
                'ram' => '-',
                'storage' => '-',
                'category_id' => 7
            ],
            [
                'name' => 'Anker PowerCore 24K Power Bank',
                'brand' => 'Anker',
                'price' => 14999,
                'description' => '24,000mAh external battery power bank, 140W two-way fast charge, and intelligent color status display screen.',
                'image' => 'https://images.unsplash.com/photo-1609592424109-dd77d704c311?q=80&w=600&auto=format&fit=crop',
                'ram' => '-',
                'storage' => '-',
                'category_id' => 8
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $imagePath = '\images';

        $products = [
            [
                'name' => 'Laptop',
                'description' => 'Powerful laptop with high-performance specifications.',
                'price' => 1200.00,
                'slug' => 'laptop',
                'image' => $imagePath . '\laptop.jpg',
                'status' => 1,
            ],
            [
                'name' => 'Smartphone',
                'description' => 'Latest smartphone with advanced features and camera.',
                'price' => 800.00,
                'slug' => 'smartphone',
                'image' => $imagePath . '\smartphone.jpg',
                'status' => 1,
            ],
            [
                'name' => 'Tablet',
                'description' => 'Compact tablet with a high-resolution display.',
                'price' => 500.00,
                'slug' => 'tablet',
                'image' => $imagePath . '\tablet.jpg',
                'status' => 1,
            ],
            [
                'name' => 'Gaming PC',
                'description' => 'Custom gaming PC with top-notch graphics and performance.',
                'price' => 2500.00,
                'slug' => 'gaming-pc',
                'image' => $imagePath . '\gaming_pc.jpg',
                'status' => 1,
            ],
            [
                'name' => 'Camera',
                'description' => 'Professional camera with high-resolution imaging.',
                'price' => 1200.00,
                'slug' => 'camera',
                'image' => $imagePath . '\camera.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Headphones',
                'description' => 'Wireless headphones with noise-canceling technology.',
                'price' => 150.00,
                'slug' => 'headphones',
                'image' => $imagePath . '\headphones.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Smartwatch',
                'description' => 'Advanced smartwatch with health monitoring features.',
                'price' => 300.00,
                'slug' => 'smartwatch',
                'image' => $imagePath . '\smartwatch.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Printer',
                'description' => 'High-quality printer for professional document printing.',
                'price' => 200.00,
                'slug' => 'printer',
                'image' => $imagePath . '\printer.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Fitness Tracker',
                'description' => 'Fitness tracker with heart rate monitoring and GPS.',
                'price' => 100.00,
                'slug' => 'fitness-tracker',
                'image' => $imagePath . '\fitness_tracker.jpg',
                'status' => 0,
            ],
            [
                'name' => 'External Hard Drive',
                'description' => 'Large-capacity external hard drive for data storage.',
                'price' => 120.00,
                'slug' => 'external-hard-drive',
                'image' => $imagePath . '\external_hard_drive.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Wireless Router',
                'description' => 'High-speed wireless router for seamless internet connectivity.',
                'price' => 80.00,
                'slug' => 'wireless-router',
                'image' => $imagePath . '\wireless_router.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with excellent audio quality.',
                'price' => 50.00,
                'slug' => 'bluetooth-speaker',
                'image' => $imagePath . '\bluetooth_speaker.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Graphic Design Software',
                'description' => 'Professional graphic design software for creative projects.',
                'price' => 300.00,
                'slug' => 'graphic-design-software',
                'image' => $imagePath . '\graphic_design_software.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse for comfortable computing.',
                'price' => 30.00,
                'slug' => 'wireless-mouse',
                'image' => $imagePath . '\wireless_mouse.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Home Security Camera',
                'description' => 'Smart home security camera with motion detection.',
                'price' => 150.00,
                'slug' => 'security-camera',
                'image' => $imagePath . '\security_camera.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Office Chair',
                'description' => 'Comfortable and adjustable office chair for long work hours.',
                'price' => 120.00,
                'slug' => 'office-chair',
                'image' => $imagePath . '\office_chair.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Wireless Keyboard',
                'description' => 'Compact wireless keyboard for efficient typing.',
                'price' => 40.00,
                'slug' => 'wireless-keyboard',
                'image' => $imagePath . '\wireless_keyboard.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Solar Power Bank',
                'description' => 'Portable solar power bank for on-the-go charging.',
                'price' => 60.00,
                'slug' => 'solar-power-bank',
                'image' => $imagePath . '\solar_power_bank.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Virtual Reality Headset',
                'description' => 'Immersive virtual reality headset for gaming and experiences.',
                'price' => 200.00,
                'slug' => 'vr-headset',
                'image' => $imagePath . '\vr_headset.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Wireless Earbuds',
                'description' => 'Compact wireless earbuds with noise isolation.',
                'price' => 70.00,
                'slug' => 'wireless-earbuds',
                'image' => $imagePath . '\wireless_earbuds.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Car Dash Cam',
                'description' => 'Dashboard camera for recording travel adventures.',
                'price' => 90.00,
                'slug' => 'dash-cam',
                'image' => $imagePath . '\dash_cam.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Robot Vacuum Cleaner',
                'description' => 'Smart robot vacuum for automated cleaning.',
                'price' => 180.00,
                'slug' => 'robot-vacuum',
                'image' => $imagePath . '\robot_vacuum.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Digital Drawing Tablet',
                'description' => 'Graphic drawing tablet for digital artists.',
                'price' => 150.00,
                'slug' => 'drawing-tablet',
                'image' => $imagePath . '\drawing_tablet.jpg',
                'status' => 0,
            ],
            [
                'name' => 'Wireless Charging Pad',
                'description' => 'Qi-enabled wireless charging pad for smartphones.',
                'price' => 25.00,
                'slug' => 'charging-pad',
                'image' => $imagePath . '\charging_pad.jpg',
                'status' => 0,
            ],
        
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'slug' => $product['slug'],
                'image' => $product['image'],
                'status' => $product['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

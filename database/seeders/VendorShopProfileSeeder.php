<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'vendor@gmail.com')->first();
        $vendor = new Vendor();
        $vendor->banner = 'uploads/1234.jpg';
        $vendor->shop_name = 'Vendor Shop';
        $vendor->phone = '123123123';
        $vendor->email = 'vendor@gmail.com';
        $vendor->address = 'Indonesia';
        $vendor->description = 'shop desc';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}

<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Jack Black',
            'email' => 'jack.black@gmail.com',
            'street' => '31 Reva Road',
            'city' => 'Stafford',
            'postcode' => 'ST17 9BP',
            'country' => 'United Kindom',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('clients')->insert([
            'name' => 'Paul Smith',
            'email' => 'paul.smith.black@gmail.com',
            'street' => '5 Rainbow road',
            'city' => 'Stafford',
            'postcode' => 'ST17 9BE',
            'country' => 'United Kindom',
            'user_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('items')->insert([
            "name_description" => 'Vanilla Protein shake 100g',
            "quantity" => 1,
            "unit" => 45,
            "invoice_id" => '1',
        ]);

        DB::table('invoices')->insert([
            'title' => 'Supplements',
            'description' => 'all suppplements from chogainz.com',
            'purchase_order_number' => 'XYZ123',
            'invoice_number' => 'ABC298',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'invoice_date' => Carbon::now()->addWeek()->format('Y-m-d H:i:s'),
            'invoice_note' => 'Invoice note for Supplements',
            'invoice_paid' => true,
            'total' => 45.00,
            'user_id' => "1",
            'client_id' => "1",
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CodeDelivery\Models\User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com.br',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10)
        ])->client()->save(factory(\CodeDelivery\Models\Client::class)->make());

        factory(\CodeDelivery\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'password' => bcrypt(123456),
            'role' => 'admin',
            'remember_token' => str_random(10)
        ])->client()->save(factory(\CodeDelivery\Models\Client::class)->make());

        factory(\CodeDelivery\Models\User::class)->create([
            'role' => 'deliveryman'
        ]);

        factory(\CodeDelivery\Models\User::class, 10)->create()->each(function($usuario) {
            $usuario->client()->save(factory(\CodeDelivery\Models\Client::class)->make());
        });
    }
}

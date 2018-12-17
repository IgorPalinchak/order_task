<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = factory(Order::class, 'default', 5)->create()->each(function ($order) {
            $randomOredrStatus = array_random(App\Order::$orderStatuses);
            $order->user_id = $this->getRandomUserId();
            $order->status = $randomOredrStatus;
            $order->save();
        });
        $orders->each(function (Order $orderProduct) {
            $orderProduct->products()->attach($this->getRandomProduct());
        });
    }

    /**
     * @return int|null
     */
    private function getRandomUserId()
    {
        $rundomUser = App\User::inRandomOrder()->first();
        return !is_null($rundomUser) ? $rundomUser->id : null;

    }

    /**
     * @return int
     */
    private function getRandomProduct()
    {
        $rundomProd = App\Product::inRandomOrder()->first();
        return !is_null($rundomProd) ? $rundomProd->id : 0;
    }
}

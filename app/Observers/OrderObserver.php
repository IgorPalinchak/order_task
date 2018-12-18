<?php

namespace App\Observers;

use App\Order;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the order "updated status" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        $oderUserData = $order->users()->get();
        if (array_key_exists('status', $order->getChanges())) {

            Mail::send('emails.orderStatus', ['id' => $order->getAttribute('id'),
                'old_status' => $order->getOriginal('status'),
                'status' => $order->getAttribute('status')
            ],
                function ($message) use ($oderUserData, $order) {
                    $message->from(config('mail')['username'], 'Order Api');
                    $message->to($oderUserData['0']->getAttribute('email'), $oderUserData['0']->getAttribute('name'))->subject('Order# ' . $order->getAttribute('id') . ' status chnged');
                });
        }

    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}

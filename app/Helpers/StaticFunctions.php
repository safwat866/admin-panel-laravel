<?php
namespace App\Helpers;

use App\Models\CbdCartItem;
use App\Models\Country;
use App\Models\MillVoucher;
use App\Models\Order;
use App\Models\RaffVoucher;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Voucher;
use Auth;

class StaticFunctions
{

    // public static function getVoucher($id)
    // {
    //     return Voucher::find($id);
    // }

    // public static function getSumTicket(array $array)
    // {
    //     $sum = 0;
    //     foreach ($array as $k => $v) {
    //         $sum += \App\Models\Frontend\Ticket::ticketPrice($v);
    //     }

    //     return $sum;
    // }

    // public static function getSum($userid, $type)
    // {
    //     $sum = CbdCartItem::where(["user_id" => $userid, 'cart_type' => $type])->status()->sum("amount");
    //     return $sum;
    // }

    // public static function getcuntryname($id)
    // {
    //     $cat = Country::find($id);
    //     return $cat->asciiname;
    // }

    // public static function getticket($id)
    // {
    //     return Ticket::where('id', $id)->first();

    // }

    // public static function countcart($authid)
    // {
    //     // $vouchers = CbdVoucher::where(["user_id" => $authid, 'status' => 1])->get();
    //     // if(!empty($vouchers)){
    //     // $count = 0;
    //     // foreach($vouchers as $voucher){
    //     //     if(!empty(unserialize($voucher->voucher_id))){
    //     //     $get = count(unserialize($voucher->voucher_id));
    //     //     $count += $get;
    //     //     }
    //     // }
    //     // }
    //     $counttdr = RaffVoucher::where(['user_id' => $authid, 'status' => 1])->groupBy('ticket_no')->get()->count();
    //     $counttdm = MillVoucher::where(['user_id' => $authid, 'status' => 1])->groupBy('setno')->get()->count();
    //     $count = $counttdm + $counttdr;
    //     return $count;

    // }

    // public static function getsets($setno)
    // {
    //     return CbdCartItem::where(["user_id" => Auth::user()->id, "setno" => $setno])->status()->tdm()->get();
    // }

    // public static function countusesreff($reff)
    // {
    //     $all = Order::where("used_refferal_code", $reff)->get();
    //     return $all->count();
    // }

    // public static function getcoinsworth($coins)
    // {
    //     $coins_value_percentage = array_get(app('settings'), 'coins_value_percentage');
    //     $coinsworth = ($coins / 100) * $coins_value_percentage;
    //     return $coinsworth;
    // }

    // public static function getcoinsfrommoney($money)
    // {
    //     $coins_per_dirham = array_get(app('settings'), 'coins_per_dirham');
    //     $coins_award_on_currency = array_get(app('settings'), 'coins_award_on_currency');
    //     $coins_value_percentage = array_get(app('settings'), 'coins_value_percentage');
    //     $getcoins = ($money / $coins_per_dirham) * $coins_award_on_currency;
    //     $getcoins = $getcoins * 100;
    //     return $getcoins;
    // }

    // public static function coinsawarded($money)
    // {
    //     $coins_per_dirham = array_get(app('settings'), 'coins_per_dirham');
    //     $coins_award_on_currency = array_get(app('settings'), 'coins_award_on_currency');
    //     $coins_value_percentage = array_get(app('settings'), 'coins_value_percentage');
    //     $getcoins = ($money / $coins_per_dirham) * $coins_award_on_currency;
    //     return $getcoins;
    // }

    // public static function generatevouchers($number)
    // {
    //     return Voucher::inRandomOrder()->take($number)->get();

    // }

}

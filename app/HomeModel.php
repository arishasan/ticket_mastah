<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    
    static function getCountUser(){
    	$query = DB::table('user')
    			 ->get();
    	return count($query->toArray());
    }

    static function getReserve(){
    	$query = DB::table('reservation')
    			 ->get();
    	return count($query->toArray());
    }

    static function getTransportation(){
    	$query = DB::table('transportation')
    			 ->get();
    	return count($query->toArray());
    }

    static function getCustomerCount(){
    	$query = DB::table('customer')
    			 ->get();
    	return count($query->toArray());
    }

    static function getEarning(){
    	$query = DB::table('reservation')
    			 ->selectRaw('SUBSTR(reservation_date,1,10) as `payment_date`,SUM(price) as `payment`')
    			 ->groupBy('payment_date')
    			 ->get();
    	return $query->toArray();
    }

}

<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    
    static function getCust(){
    	$query = DB::table('customer')
    			 ->get();
    	return $query->toArray();
    }

    static function getTransportation(){
    	$query = DB::table('transportation')
    			 ->selectRaw('transportation.*,transportation_type.description as `transportation_type_name`')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->get();
    	return $query->toArray();
    }

    static function getRute(){
    	$query = DB::table('rute')
    			 ->get();
    	return $query->toArray();
    }

    static function getReservation(){
    	$query = DB::table('reservation')
    			 ->get();
    	return $query->toArray();
    }

}

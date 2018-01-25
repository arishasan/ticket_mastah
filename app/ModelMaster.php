<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ModelMaster extends Model
{
    
    static function getDatarute(){
    	$query = DB::table('rute')
    			 ->selectRaw('rute.*,transportation.id as `trasport_id`,transportation_type.id as `type_id`')
    			 ->join('transportation','rute.transportationid','=','transportation.id')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->get();
    	return $query->toArray();
    }

    static function getDataTransport(){
    	$query = DB::table('transportation')
    			 ->selectRaw('transportation.*,transportation_type.description as `nameType`')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->get();
    	return $query->toArray();
    }

    static function checkRuteTransport($id){
    	$query = DB::table('rute')
    			 ->select('*')
    			 ->whereRaw('transportationid = "'.$id.'"')
    			 ->get();
    	return $query->toArray();
    }

    static function getAutoNumberRUTE(){
    	date_default_timezone_set('Asia/Jakarta');
    	$initial = 'RUTE';
    	$year = date('Y');
    	$end = '';
    	$data = DB::table('rute')->get();
    	foreach ($data->toArray() as $key => $value) {
    		$end = $value->id;
    	}

    	$trim = substr($end,8,12);
    	$equal = $trim+1;
    	$returning = $initial.$year.sprintf('%04d',$equal);
    	return $returning;
    }

    static function saveRUTE($input){
    	try {
    		$auto = \App\ModelMaster::getAutoNumberRUTE();
    		$query = DB::table('rute')
    				 ->insert([
    				 	'id' => $auto,
    				 	'rute_from' => $input['rute_from'],
    				 	'rute_to' => $input['rute_to'],
    				 	'depart' => $input['depart'],
    				 	'arrive' => $input['Arrive'],
    				 	'price' => $input['price'],
    				 	'transportationid' => $input['transport_id']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function getAutoNumberTTYPE(){
    	date_default_timezone_set('Asia/Jakarta');
    	$initial = 'TTP';
    	$end = '';
    	$data = DB::table('transportation_type')->get();
    	foreach ($data->toArray() as $key => $value) {
    		$end = $value->id;
    	}
    	$trim = substr($end,3,7);
    	$equal = $trim+1;
    	$returning = $initial.sprintf('%04d',$equal);
    	return $returning;
    }

    static function updateRUTE($input){
    	try {
    		$query = DB::table('rute')
 					 ->where('id',$input['id_edit'])   		
    				 ->update([
    				 	'rute_from' => $input['rute_from_edit'],
    				 	'rute_to' => $input['rute_to_edit'],
    				 	'depart' => $input['depart_edit'],
    				 	'arrive' => $input['Arrive_edit'],
    				 	'price' => $input['price_edit'],
    				 	'transportationid' => $input['transport_id_edit']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function deleteRUTE($id){
    	try {

    		$query = DB::table('rute')
    				 ->where('id',$id)
    				 ->delete();

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function getTransportType(){
    	$query = DB::table('transportation_type')
    			 ->get();
    	return $query->toArray();
    }

    static function saveTransportType($input){
    	try {
    		$auto = \App\ModelMaster::getAutoNumberTTYPE();
    		$query = DB::table('transportation_type')
    				 ->insert([
    				 	'id' => $auto,
    				 	'description' => $input['description']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function updateTransportType($input){
    	try {
    		$query = DB::table('transportation_type')
 					 ->where('id',$input['id_edit'])   		
    				 ->update([
    				 	'description' => $input['description_edit']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function deleteTransportType($id){
    	try {

    		$query = DB::table('transportation_type')
    				 ->where('id',$id)
    				 ->delete();

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function getListTransportation(){
    	$query = DB::table('transportation')
    			 ->selectRaw('transportation.*,transportation_type.id as `transportType_id`,transportation_type.description as `transportType_desc`')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->get();
    	return $query->toArray();
    }

    static function getAutoNumberTRANSPORT(){
    	date_default_timezone_set('Asia/Jakarta');
    	$initial = 'TR';
    	$year = date('Y');
    	$end = '';
    	$data = DB::table('transportation')->get();
    	foreach ($data->toArray() as $key => $value) {
    		$end = $value->id;
    	}
    	$trim = substr($end,6,11);
    	$equal = $trim+1;
    	$returning = $initial.$year.sprintf('%04d',$equal);
    	return $returning;
    }

    static function saveTransportation($input){
    	try {
    		$auto = \App\ModelMaster::getAutoNumberTRANSPORT();
    		$query = DB::table('transportation')
    				 ->insert([
    				 	'id' => $auto,
    				 	'code' => $input['code'],
    				 	'description' => $input['description'],
    				 	'seat_qty' => $input['seat_qty'],
    				 	'transportation_typeid' => $input['transport_type_id'],
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function updateTransportation($input){
    	try {
    		$query = DB::table('transportation')
    				 ->where('id',$input['id_edit'])
    				 ->update([
    				 	'code' => $input['code_edit'],
    				 	'description' => $input['description_edit'],
    				 	'seat_qty' => $input['seat_qty_edit'],
    				 	'transportation_typeid' => $input['transport_type_id_edit'],
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function deleteTransportation($id){
    	try {

    		$query = DB::table('transportation')
    				 ->where('id',$id)
    				 ->delete();

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function takeID($id){
        $query = DB::table('user')
                 ->where('id',$id)
                 ->get();
                 $ret = '';
        foreach ($query->toArray() as $key => $value) {
            $ret = $value->id;
        }
        return $ret;
    }

    static function getAllUser($level){

        if($level == 'Operator'){
            $query = DB::table('user')
                 ->whereRaw('level != "SUPER ADMIN" AND id = "'.AUTH::id().'"')
                 ->select('*')
                 ->get();
            return $query->toArray();
        }else if($level == 'SUPER ADMIN'){
            $query = DB::table('user')
                 ->select('*')
                 ->get();
            return $query->toArray();
        }else if($level == 'Admin'){
            $query = DB::table('user')
                 ->whereRaw('level != "SUPER ADMIN"')
                 ->select('*')
                 ->get();
            return $query->toArray();
        }
    }

    static function getAutoNumberUSER(){
        date_default_timezone_set('Asia/Jakarta');
        $initial = 'US';
        $end = '';
        $data = DB::table('user')->select('id_user')->get();
        foreach ($data->toArray() as $key => $value) {
            $end = $value->id_user;
        }
        $trim = substr($end,2,6);
        $equal = $trim+1;
        $returning = $initial.sprintf('%04d',$equal);
        return $returning;
    }

    static function saveUSER($input){
        try {
            date_default_timezone_set('Asia/Jakarta');
            $auto = \App\ModelMaster::getAutoNumberUSER();
            $query = DB::table('user')
                     ->insert([
                        'id' => '',
                        'id_user' => $auto,
                        'username' => $input['username'],
                        'password' => bcrypt($input['password']),
                        'fullname' => $input['fullname'],
                        'level' => $input['level'],
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                     ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function updateUSER($input){
        try {
            date_default_timezone_set('Asia/Jakarta');
            $query = DB::table('user')
                     ->where('id_user',$input['id_edit'])
                     ->update([
                        'username' => $input['username_edit'],
                        'password' => bcrypt($input['password_edit']),
                        'fullname' => $input['fullname_edit'],
                        'level' => $input['level_edit'],
                        'updated_at' => date('Y-m-d')
                     ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function deleteUSER($id){
        try {

            $query = DB::table('user')
                     ->where('id_user',$id)
                     ->delete();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}

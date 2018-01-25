<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    
    static function getTransport($id,$rute){
    	$query = DB::table('transportation')
    			 ->selectRaw('transportation.*,rute.id as `rute_id`')
    			 ->join('rute','transportation.id','=','rute.transportationid')
    			 ->whereRaw('transportation.id = "'.$id.'" AND rute.id = "'.$rute.'"')
    			 ->get();
    	return $query->toArray();
    }

    static function getCustomer($id){

    	$query = DB::table('reservation')
    			 ->selectRaw('reservation.*,customer.id as `custom_id`,customer.identity_card_no,customer.name,customer.address,rute.rute_from,rute.rute_to,rute.depart,rute.arrive')
    			 ->join('customer','reservation.customerid','=','customer.id')
    			 ->join('rute','reservation.ruteid','=','rute.id')
    			 ->where('reservation.id',$id)
    			 ->get();

    	return $query->toArray();

    }

    // static function getRute($transport){
    // 	$query = DB::table('rute')
    // 			 ->select('*')
    // 			 ->whereRaw('transportationid = "'.$transport.'"')
    // 			 ->get();
    // 	return $query->toArray();
    // }

    static function getRuteByFromAndTO($e,$e2){
        $query = DB::table('transportation')
                 ->selectRaw('transportation.*,transportation_type.description as `type_name`,rute.id as `rute_id`,rute.rute_from,rute.rute_to,rute.depart,rute.arrive,rute.price')
                 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
                 ->join('rute','rute.transportationid','=','transportation.id')
                 ->where('rute.rute_from','like','%'.$e.'%')
                 ->where('rute.rute_to','like','%'.$e2.'%')
                 ->get();
        return $query->toArray();
    }

    static function getTransport_join(){
    	$query = DB::table('transportation')
    			 ->selectRaw('transportation.*,transportation_type.description as `type_name`,rute.id as `rute_id`,rute.rute_from,rute.rute_to,rute.depart,rute.arrive,rute.price')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->join('rute','rute.transportationid','=','transportation.id')
    			 ->get();
    	return $query->toArray();
    }

    static function getTransport_join_byID($id){
        $query = DB::table('transportation')
                 ->selectRaw('transportation.*,transportation_type.description as `type_name`,rute.id as `rute_id`,rute.rute_from,rute.rute_to,rute.depart,rute.arrive,rute.price')
                 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
                 ->join('rute','rute.transportationid','=','transportation.id')
                 ->where('rute.id',$id)
                 ->get();
        return $query->toArray();
    }

    static function checkSeat($seat,$transport,$rute){
    	date_default_timezone_set('Asia/Jakarta');
    	$tgl = date('Y-m-d');
    	$query = DB::table('reservation')
    			 ->selectRaw('reservation.*,rute.transportationid,rute.id as `rute_id`')
    			 ->join('rute','reservation.ruteid','=','rute.id')
    			 ->whereRaw('rute.id = "'.$rute.'" AND reservation.seat_code = "'.$seat.'" AND rute.transportationid="'.$transport.'" AND reservation.depart_date >= "'.$tgl.'"')
    			 ->get();

    			 // rute.id = "'.$rute.'" AND 

    	$data = $query->toArray();
    	

    	return $data;
    }

    static function getRandom_code($length = 6) {
        // Available characters
        $chars = '0123456789abcdefghjkmnoprstvwxyz';

        $Code = '';
        // Generate code
        for ($i = 0; $i < $length; ++$i) {
            $Code .= substr($chars, (((int) mt_rand(0, strlen($chars))) - 1), 1);
        }
        return strtoupper('RES'.$Code.'404');
    }

    static function getReserveNumber(){
    	$end = '';
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Ymd');
    	$initial = 'REV';
    	$data = DB::table('reservation')->get();
    	foreach ($data->toArray() as $key => $value) {
    		$end = $value->id;
    	}
    	// REV201805110001
    	$trim = substr($end,11,15);
    	$add = $trim + 1;
    	$arr = $initial.$date.sprintf('%04d',$add);
    	return $arr;
    }

    static function checkCustomer($id){
    	$query = DB::table('customer')
    			 ->where('identity_card_no',$id)
    			 ->get();
    	return $query->toArray();
    }

    static function getCustomerID(){
    	$end = '';
    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Ymd');
    	$initial = 'CUST';
    	$data = DB::table('customer')->get();
    	foreach ($data->toArray() as $key => $value) {
    		$end = $value->id;
    	}
    	// CUST0001
    	$trim = substr($end,4,8);
    	$add = $trim + 1;
    	$arr = $initial.sprintf('%04d',$add);
    	return $arr;
    }

    static function checkUser($id){
    	$query = DB::table('user')
    			 ->where('id',$id)
    			 ->limit('1')
    			 ->get();
    	$data = $query->toArray();

    	foreach ($data as $key => $value) {
    		$thing = $value->id_user;
    	}

    	return $thing;
    }

    static function checkUserAll(){
        $query = DB::table('user')
                 ->where('id',AUTH::id())
                 ->limit('1')
                 ->get();
        $data = $query->toArray();
        return $data;
    }

    static function save_transaction($input){
    	try {
    		date_default_timezone_set('Asia/Jakarta');
    		// CUSTOMER
    		
    		$check = \App\TransactionModel::checkCustomer($input['identity_card_no']);
    		$equal = count($check);
    		$customer_id = '';

            $cust_id = '';
            foreach ($check as $key => $value) {
                $cust_id = $value->id;
            }

            $checkRecordCUST = DB::table('customer')->whereRaw('id = "'.$cust_id.'" AND id IN(select customerid FROM reservation WHERE depart_date >= "'.date('Y-m-d').'")')->get();

            if(count($checkRecordCUST) > 0){
                return 'zero';
            }else{


    		if($equal == 0){
    			// INSERT
    			$customer_id = \App\TransactionModel::getCustomerID();
    			$queryINSCUST = DB::table('customer')
    							->insert([
    								'id' => $customer_id,
    								'identity_card_no' => $input['identity_card_no'],
    								'name' => $input['name'],
    								'address' => $input['address'],
    								'phone' => $input['phone'],
    								'gender' => $input['gender'],
    							]);

    		}else{
    			// UPDATE
    			$id = '';
    			foreach ($check as $key => $value) {
    				$id = $value->id;
    			}

    			$customer_id = $id;
    			$queryUPDCUST = DB::table('customer')
    							->where('id',$customer_id)
    							->update([
    								'identity_card_no' => $input['identity_card_no'],
    								'name' => $input['name'],
    								'address' => $input['address'],
    								'phone' => $input['phone'],
    								'gender' => $input['gender'],
    							]);

    		}

            



    		$automaticReservationNO = \App\TransactionModel::getReserveNumber();

    		$checkUser = \App\TransactionModel::checkUser(AUTH::id());

    		$queryINSTRANS = DB::table('reservation')
    						 ->insert([
    						 	'id' => $automaticReservationNO,
    						 	'reservation_code' => $input['reserve_code'],
    						 	'reservation_date' => date('Y-m-d H:m:s'),
    						 	'customerid' => $customer_id,
    						 	'depart_date' => date('Y-m-d',strtotime($input['reserveData'])),
    						 	'seat_code' => $input['seat_code'],
    						 	'price' => $input['price'],
    						 	'ruteid' => $input['rute_id'],
    						 	'userid' => $checkUser,
    						 ]);

    		return $automaticReservationNO;

            }
    		
    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

}

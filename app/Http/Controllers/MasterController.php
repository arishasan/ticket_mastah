<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{

    public function user_save(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveUSER($input);

        if($execute){
            echo "Success Inserting New User";
        }else{
            echo "Failed Inserting New User";
        }

    }

    public function user_update(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateUSER($input);

        if($execute){
            echo "Success Saving User";
        }else{
            echo "Failed Saving User";
        }

    }

    public function user_delete($id){
        $execute = \App\ModelMaster::deleteUSER($id);

        if($execute){
            echo "Success Deleting User";
        }else{
            echo "Failed Deleting User";
        }
    }



    public function rute(){
    	$data['dataTransport'] = \App\ModelMaster::getDataTransport();
    	$data['datarute'] = \App\ModelMaster::getDatarute();
    	return view('master/rute')->with($data);
    }

    public function save_the_rute(Request $request){
    	$input = $request->all();

    	$execute = \App\ModelMaster::saveRUTE($input);

    	if($execute){
    		echo "Success Saving The Rute";
    	}else{
    		echo "Failed Saving The Rute";
    	}

    }

    public function update_the_rute(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateRUTE($input);

        if($execute){
            echo "Success Updating The Rute";
        }else{
            echo "Failed Updating The Rute";
        }

    }

    public function delete_the_rute($id){
        $execute = \App\ModelMaster::deleteRUTE($id);

        if($execute){
            echo "Success Deleting The Rute";
        }else{
            echo "Failed Deleting The Rute";
        }
    }

    public function transport_type(){
        $data['listDataTType'] = \App\ModelMaster::getTransportType();
        return view('master/transport_type')->with($data);
    }

    public function save_the_transport_type(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveTransportType($input);

        if($execute){
            echo "Success Saving The Transport Type";
        }else{
            echo "Failed Saving The Transport Type";
        }

    }

    public function update_the_transport_type(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateTransportType($input);

        if($execute){
            echo "Success Updating The Transport Type";
        }else{
            echo "Failed Updating The Transport Type";
        }

    }

    public function delete_the_transport_type($id){
        $execute = \App\ModelMaster::deleteTransportType($id);

        if($execute){
            echo "Success Deleting The Transport Type";
        }else{
            echo "Failed Deleting The Transport Type";
        }
    }

    public function transportation(){
        $data['listTransportationType'] = \App\ModelMaster::getTransportType();
        $data['listTransportation'] = \App\ModelMaster::getListTransportation();
        return view('master/transportation')->with($data);
    }

    public function generateRandomCode($length = 8) {
        // Available characters
        $chars = '0123456789abcdefghjkmnoprstvwxyz';

        $Code = '';
        // Generate code
        for ($i = 0; $i < $length; ++$i) {
            $Code .= substr($chars, (((int) mt_rand(0, strlen($chars))) - 1), 1);
        }
        return strtoupper($Code);
    }

    public function save_the_transportation(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveTransportation($input);

        if($execute){
            echo "Success Inserting The Transportation";
        }else{
            echo "Failed Inserting The Transportation";
        }

    }

    public function update_the_transportation(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateTransportation($input);

        if($execute){
            echo "Success Saving The Transportation";
        }else{
            echo "Failed Saving The Transportation";
        }

    }

    public function delete_the_transportation($id){
        $execute = \App\ModelMaster::deleteTransportation($id);

        if($execute){
            echo "Success Deleting The Transportation";
        }else{
            echo "Failed Deleting The Transportation";
        }
    }

}

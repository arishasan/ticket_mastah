<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function customer(){
    	$data['datacust'] = \App\ReportModel::getCust();
    	return view('report/customer')->with($data);
    }

    public function transportation(){
    	$data['dataTransport'] = \App\ReportModel::getTransportation();
    	return view('report/transportation')->with($data);
    }

    public function rute(){
    	$data['dataRute'] = \App\ReportModel::getRute();
    	return view('report/rute')->with($data);
    }

    public function reservation(){
    	$data['datareservation'] = \App\ReportModel::getReservation();
    	return view('report/reservation')->with($data);
    }

}

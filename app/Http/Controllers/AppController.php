<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

class AppController extends Controller
{
    public function index() {    
      return View::make('app.index');
    }

    public function curl()
    {
    	$curl = new \Curl\Curl();
    	$curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
    	$curl->get('http://food2fork.com/api/search',[
    		'key'=>'9812f92eb4f0fb04ca7f95930e87820e']);
    	return $curl->response;
    }

    public function curlDetail($id)
    {
    	$curl = new \Curl\Curl();
    	$curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
    	$curl->get('http://food2fork.com/api/get',[
    		'key'=>'9812f92eb4f0fb04ca7f95930e87820e',
    		'rId'=>$id]);
    	return $curl->response;
    }

    public function details($id) {
    	return View::make('app.details',['id'=>$id]);
    }

}

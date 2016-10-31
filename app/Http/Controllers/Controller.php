<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $server_message = '';
    
    function loadpage($view,$title, $data = array()) {
        $data['title'] = $title;
        $data['SERVER_MESSAGE'] = $this->get_message();
        return view($view)->with($data);
    }
    
    function set_message($message = '') {
        $this->server_message = $message;
        return $this;
    }
    
    function get_message() {
        if (\Session::has('SERVER_MESSAGE')) {
            $server_message = \Session::get('SERVER_MESSAGE');
            \Session::put('SERVER_MESSAGE', '');
            \Session::forget('SERVER_MESSAGE');
        } else {
            $server_message = NULL;
        }
        return $server_message;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\State;
use App\Form;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function statelist(Request $request)
    {
    	$res=State::where('country_id','101')->get();
    	return $res;
    }
    public function formsubmit(Request $request)
    {

        $arr2 = str_split($request->txtGSTIN, 2);
        $valid_pan_no=substr($request->txtGSTIN, 2);
        $def=substr($valid_pan_no, 0, -3);
        if($arr2[0] != $request->state_code || $request->panno != $def)
        {
            return "gst number invalid";

        }else{
                $val=new Form();
                $val->name=$request->name;
                $val->email=$request->email;
                $val->sate_id=$request->state_id;
                $val->pan_no=$request->panno;
                $val->gst_no=$request->txtGSTIN;
                $res=$val->save();
                if($res)
                {
                    return "form has been submitted successfully";
                    die;
                }
                else{
                    return "some error occurs";
                    die;
                }
        }
        

    	/*return $request->input();*/
    }

    public function chatStart(Request $request)
    {
        return view('chat');
    }
    public function getUserList(Request $request)
    {
        $res=User::all();
        return $res;
    }
    public function def(Request $request)
    {
        return $request->input();
    }
}

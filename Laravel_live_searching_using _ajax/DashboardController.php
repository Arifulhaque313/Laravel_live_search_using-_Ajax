<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class DashboardController extends Controller
{
    //
    public function index()
    {   
        $users = User::get();
        return view('dashboard.index',compact('users'));
        
    }

    public function search(Request  $request){

        if($request->ajax()){
            $data = User::where('id','like','%'.$request->search.'%')
            ->orwhere('first_name','like','%'.$request->search.'%')
            ->orwhere('role','like','%'.$request->search.'%')
            ->orwhere('email','like','%'.$request->search.'%')->get();

                $output ='';

                if(count($data)>0){

                    $output ='
                    <table class="table">
                   
                    <tbody>';

                        foreach($data as $row){

                            //running code  
                            $output .='
                            <tr>
                            <td>'.$row->id.'</td>
                            <td>'.$row->first_name.'  '.$row->last_name.'</td>
                            <td>'.$row->email.'</td>
                            <td>'.$row->role.'</td>
                            </tr>
                            ';
                        }



                $output .= '
                    </tbody>
                    </table>';
                }
                else{
                    $output.='No result';
                }
                return $output;
                }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\roomModel;

class Admin extends Controller
{
    // ROUTES
        public function adminDashboard(){
            return view('admin/dashboard');
        }   
        public function adminRoom(){
            return view('admin/room');
        }   
        public function adminNotAvailableRoom(){
            return view('admin/notAvailableRoom');
        }   
        public function addNewRoom(){
            return view('admin/addNewRoom');
        }   
        public function adminReservation(){
            return view('admin/reservation');
        }   
        public function adminCompleted(){
            return view('admin/completed');
        }   
        public function adminCustomer(){
            return view('admin/customer');
        }   
        public function adminInActiveCustomer(){
            return view('admin/inactiveCustomer');
        }   
        public function adminAccount(){
            return view('admin/account');
        }   
    // ROUTES

    // FUNCTION
            // ACTIVE USER DATA FOR TABLE
                   public function getActiveCustomer(Request $request){  
                    $data = userModel::where([['is_active', '=', 1],['is_admin', '=', 0],['lastname', '!=', 'NULL']])->select(
                        'user_id','lastname','firstname','middlename','extention','email','phoneNumber'
                    )->get();
                    return response()->json($data);
                }  
            // ACTIVE USER DATA FOR TABLE

            // ACTIVE USER DATA FOR TABLE
                public function getInActiveCustomer(Request $request){  
                    $data = userModel::where([['is_active', '=', 0],['is_admin', '=', 0],['lastname', '!=', 'NULL']])->select(
                        'user_id','lastname','firstname','middlename','extention','email','phoneNumber'
                    )->get();
                    return response()->json($data);
                }  
            // ACTIVE USER DATA FOR TABLE

            // PERSONAL INFORMATION FOR ACCOUNT
                public function getUserInfo(Request $request){  
                    $data = userModel::where([['user_id', '=', auth()->guard('userModel')->user()->user_id]])->first();
                    return response()->json($data);
                }  
            // PERSONAL INFORMATION FOR ACCOUNT

            // AVAILABLE ROOM FOR TABLE
                public function getAvailableRoom(Request $request){  
                    $data = roomModel::where([['is_available', '=', 1]])->select(
                        'room_id','room_number','floor','floor','price_per_hour'
                    )->get();
                    return response()->json($data);
                } 
            // AVAILABLE ROOM FOR TABLE

            // AVAILABLE ROOM FOR TABLE
                public function getNotAvailableRoom(Request $request){  
                    $data = roomModel::where([['is_available', '=', 0]])->select(
                        'room_id','room_number','floor','floor','price_per_hour'
                    )->get();
                    return response()->json($data);
                } 
            // AVAILABLE ROOM FOR TABLE
    // FUNCTION
}
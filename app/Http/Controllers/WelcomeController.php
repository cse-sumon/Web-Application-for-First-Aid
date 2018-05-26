<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use redirect;

class WelcomeController extends Controller
{
    public function index(){
    	$home_content = view('pages.home_content');
    	return view('master')->with('main_content', $home_content);
    }

    public function about(){
    	$about = view('pages.about');
    	return view('master')->with('main_content',$about);
    }


    public function sub_category($category_id){

        $all_sub_category_by_category_id=DB::table('tbl_relation')
                                         ->where('category_id',$category_id)
                                        ->join('tbl_sub_category', 'tbl_relation.sub_category_id','=', 'tbl_sub_category.sub_category_id')
                                        ->select('tbl_relation.*','tbl_sub_category.sub_category_name')
                                        ->get();

    	$sub_category = view('pages.sub_category')
                        ->with('all_sub_category',$all_sub_category_by_category_id);

    	return view('master')->with('main_content',$sub_category);
    }



     public function medicine(Request $request){
        $all_medicine_by_sub_category=array();
        $sub_category_id=$request->sub_category;
        if($sub_category_id){
            
            $medicine_by_sub_category=DB::table('tbl_prescription')
                            ->join('tbl_medicine','tbl_prescription.medicine_id', '=', 'tbl_medicine.medicine_id')
                            ->select('tbl_prescription.*','tbl_medicine.*')
                            ->whereIn('sub_category_id',$sub_category_id)
                            ->get();
        
        $medicine_by_sub_category= view ('pages.medicine')
                    ->with('medicine_by_sub_category',$medicine_by_sub_category);

         return view('master')
                    ->with('main_content',$medicine_by_sub_category);           
        }
        else{
            return back();
        }
        
    } 



    public function medicine_details($medicine_id){
        $medicine_info_by_id = DB::table('tbl_medicine')
                                ->select('*')
                                ->where('medicine_id',$medicine_id)
                                ->first();

        $medicine_info=view('pages.medicine_details')
                         ->with('medicine_info',$medicine_info_by_id);

        return view('master')
                    ->with('main_content',$medicine_info);                    
    }









    // public function user_registration(){
    // 	return view('pages.user_registration');
    // }

    // public function user_login(){
    //     return view ('pages.user_login');
    // } 



}

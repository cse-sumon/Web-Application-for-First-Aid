<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class SuperAdminController extends Controller
{
    public function index(){
    	$this->super_admin_auth_check();
    	return view('admin.admin_master');
    }

    public function super_admin_auth_check() {
        session_start();
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return redirect::to('admin-panel')->send();
        }
    }

// Start category
    public function add_category(){
        $this->super_admin_auth_check();
        $add_category = view('admin.pages.add_category');

         return view ('admin.admin_master')
                        ->with('admin_main_content',$add_category);
    }


    public function save_category(Request $request){
        $this->super_admin_auth_check();

        $data=array();
        $data['category_name']=strip_tags($request->category_name);
        $data['category_description']=strip_tags($request->category_description);
        $data['publication_status']=strip_tags($request->publication_status);
        $data['created_at']=date("Y-m-d H:i:s");

        DB::table('tbl_category')->insert($data);

        Session::put('message','Save Category Successfully.');            
        return redirect::to('add-category');            
    }


    public function manage_category(){
        $this->super_admin_auth_check();

        $all_category = DB::table('tbl_category')
                            ->select('*')
                            ->get();

        $manage_category=view('admin.pages.manage_category')
                            ->with('all_category',$all_category);
        return view('admin.admin_master')
                    ->with('admin_main_content',$manage_category);                    
    }

    public function unpublished_category($category_id){
        $this->super_admin_auth_check();
        $data=array();
        $data['publication_status'] = 0;
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);
        return redirect::to('manage-category');        
    }

     public function published_category($category_id){
        $this->super_admin_auth_check();
        $data=array();
        $data['publication_status'] = 1;
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);
        return redirect::to('manage-category');        
    }

    public function edit_category($category_id){
        $this->super_admin_auth_check();
        $category_info_by_id = DB::table('tbl_category')
                        ->where('category_id',$category_id)
                        ->first();

        $edit_category =view('admin.pages.edit_category')
                            ->with('category_info',$category_info_by_id);
        return view('admin.admin_master')
                    ->with('admin_main_content',$edit_category);

    }

    public function delete_category($category_id){
        $this->super_admin_auth_check();
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->delete();
        return redirect::to('manage-category');        
    }
    public function update_category(Request $request) {
        $data = array();

        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $category_id = $request->category_id;
        DB::table('tbl_category')
                ->where('category_id', $category_id)
                ->update($data);
        return Redirect::to('manage-category');
    }

// End Category










//Start Sub Category
        public function add_sub_category(){
        $this->super_admin_auth_check();
        $add_sub_category = view('admin.pages.add_sub_category');

         return view ('admin.admin_master')
                        ->with('admin_main_content',$add_sub_category);
    }


    public function save_sub_category(Request $request){
        $this->super_admin_auth_check();
        $data=array();
        $data['sub_category_name']=strip_tags($request->sub_category_name);
        $data['sub_category_description']=strip_tags($request->sub_category_description);
        $data['publication_status']=strip_tags($request->publication_status);
        $data['created_at']=date("Y-m-d H:i:s");

        DB::table('tbl_sub_category')->insert($data);

        Session::put('message','Save sub-category Successfully.');            
        return redirect::to('add-sub-category');            
    }


    public function manage_sub_category(){
        $this->super_admin_auth_check();

        $all_sub_category = DB::table('tbl_sub_category')
                           ->select('*')
                            ->orderBy('sub_category_id','ASC') 
                            ->get();

        $manage_sub_category=view('admin.pages.manage_sub_category')
                            ->with('all_sub_category',$all_sub_category);
                            

        return view('admin.admin_master')
                    ->with('admin_main_content',$manage_sub_category);                    
    }

    public function unpublished_sub_category($sub_category_id){
        $this->super_admin_auth_check();
        $data=array();
        $data['publication_status'] = 0;
        DB::table('tbl_sub_category')
                ->where('sub_category_id',$sub_category_id)
                ->update($data);
        return redirect::to('manage-sub-category');        
    }

     public function published_sub_category($sub_category_id){
        $this->super_admin_auth_check();
        $data=array();
        $data['publication_status'] = 1;
        DB::table('tbl_sub_category')
                ->where('sub_category_id',$sub_category_id)
                ->update($data);
        return redirect::to('manage-sub-category');        
    }

    public function edit_sub_category($sub_category_id){
        $this->super_admin_auth_check();
        $sub_category_info_by_id = DB::table('tbl_sub_category')
                        ->where('sub_category_id',$sub_category_id)
                        ->first();

        $edit_sub_category =view('admin.pages.edit_sub_category')
                            ->with('sub_category_info',$sub_category_info_by_id);
        return view('admin.admin_master')
                    ->with('admin_main_content',$edit_sub_category);

    }

 
    public function update_sub_category(Request $request) {
        $data = array();

        $data['sub_category_name'] = $request->sub_category_name;
        $data['sub_category_description'] = $request->sub_category_description;
        $sub_category_id = $request->sub_category_id;
        DB::table('tbl_sub_category')
                ->where('sub_category_id', $sub_category_id)
                ->update($data);
        return Redirect::to('manage-sub-category');
    }

       public function delete_sub_category($sub_category_id){
        $this->super_admin_auth_check();
        DB::table('tbl_sub_category')
                ->where('sub_category_id',$sub_category_id)
                ->delete();
        return redirect::to('manage-sub-category');        
    }


//End Sub Category









//Start Relation between Category and Sub Category
        public function add_relation(){
        $this->super_admin_auth_check();
        $all_category=DB::table('tbl_category')
                            ->select('*')
                            ->where('publication_status',1)
                            ->orderBy('category_name')
                            ->get();

        $all_sub_category=DB::table('tbl_sub_category')
                            ->select('*')
                            ->where('publication_status',1)
                            ->orderBy('sub_category_name')
                            ->get();

        $add_relation = view('admin.pages.add_relation')
                        ->with('all_category',$all_category)
                        ->with('all_sub_category',$all_sub_category);

         return view ('admin.admin_master')
                        ->with('admin_main_content',$add_relation);
    }


    public function save_relation(Request $request){
        $this->super_admin_auth_check();

        $data=array();
        $data['category_id']=strip_tags($request->category_id);
        $data['sub_category_id']=strip_tags($request->sub_category_id);
        $data['relation_description']=strip_tags($request->relation_description);
        $data['publication_status']=strip_tags($request->publication_status);
        $data['created_at']=date("Y-m-d H:i:s");

        DB::table('tbl_relation')->insert($data);

        Session::put('message','Save relation Successfully.');            
        return redirect::to('add-relation');            
    }


    public function manage_relation(){
        $this->super_admin_auth_check();

        $all_relation = DB::table('tbl_relation')
                             ->join('tbl_category', 'tbl_relation.category_id', '=', 'tbl_category.category_id')
                             ->join('tbl_sub_category', 'tbl_relation.sub_category_id', '=', 'tbl_sub_category.sub_category_id')
                             ->select('tbl_relation.*', 'tbl_category.category_name', 'tbl_sub_category.sub_category_name')
                            ->get();

        $manage_relation=view('admin.pages.manage_relation')
                            ->with('all_relation',$all_relation);
        return view('admin.admin_master')
                    ->with('admin_main_content',$manage_relation);                    
    }

    public function unpublished_relation($relation_id){
        $this->super_admin_auth_check();
        $data=array();
        $data['publication_status'] = 0;
        DB::table('tbl_relation')
                ->where('relation_id',$relation_id)
                ->update($data);
        return redirect::to('manage-relation');        
    }

     public function published_relation($relation_id){
        $this->super_admin_auth_check();
        $data=array();
        $data['publication_status'] = 1;
        DB::table('tbl_relation')
                ->where('relation_id',$relation_id)
                ->update($data);
        return redirect::to('manage-relation');        
    }

    public function edit_relation($relation_id){
        $this->super_admin_auth_check();
        

        $relation_info_by_id = DB::table('tbl_relation')
                            ->where('relation_id',$relation_id)
                             ->join('tbl_category', 'tbl_relation.category_id', '=', 'tbl_category.category_id')
                             ->join('tbl_sub_category', 'tbl_relation.sub_category_id', '=', 'tbl_sub_category.sub_category_id')
                             ->select('tbl_relation.*', 'tbl_category.category_name', 'tbl_sub_category.sub_category_name')
                             
                            ->first();


        $all_category = DB::table('tbl_category')
                        ->select('*')         
                        ->where('publication_status',1)    
                        ->get();

        $all_sub_category = DB::table('tbl_sub_category')
                        ->select('*')
                        ->where('publication_status',1)
                        ->get();

        $edit_relation =view('admin.pages.edit_relation')
                            ->with('relation_info',$relation_info_by_id)
                            ->with('all_category',$all_category) 
                            ->with('all_sub_category',$all_sub_category);

        return view('admin.admin_master')
                    ->with('admin_main_content',$edit_relation);

    }

    
    public function update_relation(Request $request) {
        $data = array();

        $data['category_id'] = $request->category_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['relation_description'] = $request->relation_description;
        $relation_id = $request->relation_id;
        DB::table('tbl_relation')
                ->where('relation_id', $relation_id)
                ->update($data);
        return Redirect::to('manage-relation');
    }

    public function delete_relation($relation_id){
        $this->super_admin_auth_check();
        DB::table('tbl_relation')
                ->where('relation_id',$relation_id)
                ->delete();
        return redirect::to('manage-relation');        
    }
//End Relation between Category and Sub Category








//Start Medicine
    public function add_medicine() {
        $this->super_admin_auth_check();
        $published_sub_category = DB::table('tbl_sub_category')
                ->orderBy('sub_category_name','ASC')
                ->where('publication_status', 1)

                ->get();
        $add_medicine = view('admin.pages.add_medicine')
                     ->with('published_sub_category', $published_sub_category);
        return view('admin.admin_master')
                        ->with('admin_main_content', $add_medicine);
    }

    public function save_medicine(Request $request) {
        $data = array();
        $data['medicine_name'] = strip_tags($request->medicine_name);
        $data['manufacturer_name'] = strip_tags($request->manufacturer_name);
        $data['uses_role'] = strip_tags($request->uses_role);
        $data['medicine_description'] = strip_tags($request->medicine_description);
        $data['medicine_caution'] = strip_tags($request->medicine_caution);
        $data['publication_status'] = strip_tags($request->publication_status);
        $data['created_at'] = date("Y-m-d H:i:s");
        $image = $request->file('medicine_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/medicine_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['medicine_image'] = $image_url;
                DB::table('tbl_medicine')->insert($data);
                Session::put('message', 'Save medicine Information Successfully!');
                return Redirect::to('/add-medicine');
            }
        } else {
            DB::table('tbl_medicine')->insert($data);
            Session::put('message', 'Save medicine Information Successfully!');
            return Redirect::to('/add-medicine');
        }
    }

    public function manage_medicine() {
        $this->super_admin_auth_check();
        $all_medicine = DB::table('tbl_medicine')
                     ->select('*')
                     ->get();
        $manage_medicine = view('admin.pages.manage_medicine')
                ->with('all_medicine', $all_medicine);
        return view('admin.admin_master')
                        ->with('admin_main_content', $manage_medicine);
    }

    public function unpublished_medicine($medicine_id) {
        $data = array();
        $data['publication_status'] = 0;
        DB::table('tbl_medicine')
                ->where('medicine_id', $medicine_id)
                ->update($data);
        return Redirect::to('/manage-medicine');
    }

    public function published_medicine($medicine_id) {
        $data = array();
        $data['publication_status'] = 1;
        DB::table('tbl_medicine')
                ->where('medicine_id', $medicine_id)
                ->update($data);
        return Redirect::to('/manage-medicine');
    }

    public function edit_medicine($medicine_id) {
        $medicine_info_by_id = DB::table('tbl_medicine')
                ->where('medicine_id', $medicine_id)
                ->first();
        $all_published_category = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $edit_medicine = view('admin.pages.edit_medicine')
                ->with('medicine_info', $medicine_info_by_id)
                ->with('category_info', $all_published_category);
        return view('admin.admin_master')
                        ->with('admin_main_content', $edit_medicine);
    }

    public function update_medicine(Request $request) {
        $data = array();
        $medicine_id = strip_tags($request->medicine_id);
        $data['medicine_title'] = strip_tags($request->medicine_title);
        $data['category_id'] = strip_tags($request->category_id);
        $data['author_name'] = Session::get('admin_name');
        $data['medicine_short_description'] = strip_tags($request->medicine_short_description);
        $data['medicine_long_description'] = strip_tags($request->medicine_long_description);
        $image = $request->file('medicine_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/medicine_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['medicine_image'] = $image_url;
                DB::table('tbl_medicine')
                        ->where('medicine_id', $medicine_id)
                        ->update($data);
                @unlink($request->medicine_old_image);
                Session::put('message', 'Update medicine Information Successfully!');
                return Redirect::to('/manage-medicine');
            }
        } else {
            DB::table('tbl_medicine')
                    ->where('medicine_id', $medicine_id)
                    ->update($data);
            Session::put('message', 'Update medicine Information Successfully!');
            return Redirect::to('/manage-medicine');
        }
    }

    public function delete_medicine($medicine_id) {
        DB::table('tbl_medicine')
                ->where('medicine_id', $medicine_id)
                ->delete();
        return Redirect::to('/manage-medicine');
    }
//End Medicine    







    //Start prescription between Medicine and  sub_category

        public function add_prescription(){
        $this->super_admin_auth_check();
        $all_sub_category=DB::table('tbl_sub_category')
                            ->select('*')
                            ->where('publication_status',1)
                            ->orderBy('sub_category_name')
                            ->get();

        $all_medicine=DB::table('tbl_medicine')
                            ->select('*')
                            ->where('publication_status',1)
                            ->orderBy('medicine_name')
                            ->get();

        $add_prescription = view('admin.pages.add_prescription')
                        ->with('all_sub_category',$all_sub_category)
                        ->with('all_medicine',$all_medicine);

         return view ('admin.admin_master')
                        ->with('admin_main_content',$add_prescription);
    }


    public function save_prescription(Request $request){
        $this->super_admin_auth_check();

        $data=array();
        $data['sub_category_id']=($request->sub_category_id);
        $data['medicine_id']=($request->medicine_id);
        $data['prescription_description']=strip_tags($request->prescription_description);
        $data['publication_status']=strip_tags($request->publication_status);
        $data['created_at']=date("Y-m-d H:i:s");

        DB::table('tbl_prescription')->insert($data);

        Session::put('message','Save prescription Successfully.');            
        return redirect::to('add-prescription');            
    }


    public function manage_prescription(){
        $this->super_admin_auth_check();

        $all_prescription = DB::table('tbl_prescription')
                             ->join('tbl_sub_category', 'tbl_prescription.sub_category_id', '=', 'tbl_sub_category.sub_category_id')
                             ->join('tbl_medicine', 'tbl_prescription.medicine_id', '=', 'tbl_medicine.medicine_id')
                             ->select('tbl_prescription.*', 'tbl_sub_category.sub_category_name', 'tbl_medicine.medicine_name','tbl_medicine.medicine_image')
                            ->get();

        $manage_prescription=view('admin.pages.manage_prescription')
                            ->with('all_prescription',$all_prescription);
        return view('admin.admin_master')
                    ->with('admin_main_content',$manage_prescription);                    
    }

    public function unpublished_prescription($prescription_id){
        $this->super_admin_auth_check();
        $data=array();
        $data['publication_status'] = 0;
        DB::table('tbl_prescription')
                ->where('prescription_id',$prescription_id)
                ->update($data);
        return redirect::to('manage-prescription');        
    }

     public function published_prescription($prescription_id){
        $this->super_admin_auth_check();
        $data=array();
        $data['publication_status'] = 1;
        DB::table('tbl_prescription')
                ->where('prescription_id',$prescription_id)
                ->update($data);
        return redirect::to('manage-prescription');        
    }

    public function edit_prescription($prescription_id){
        $this->super_admin_auth_check();
        

        $prescription_info_by_id = DB::table('tbl_prescription')
                            ->where('prescription_id',$prescription_id)
                             ->join('tbl_sub_category', 'tbl_prescription.sub_category_id', '=', 'tbl_sub_category.sub_category_id')
                             ->join('tbl_medicine', 'tbl_prescription.medicine_id', '=', 'tbl_medicine.medicine_id')
                             ->select('tbl_prescription.*', 'tbl_sub_category.sub_category_name', 'tbl_medicine.medicine_name','tbl_medicine.medicine_image')
                            ->first();

        $all_sub_category = DB::table('tbl_sub_category')
                        ->select('*')         
                        ->where('publication_status',1)  
                        ->orderBy('sub_category_name','ASC')  
                        ->get();

        $all_medicine = DB::table('tbl_medicine')
                        ->select('*')         
                        ->where('publication_status',1) 
                        ->orderBy('medicine_name','ASC')   
                        ->get();

        $edit_prescription =view('admin.pages.edit_prescription')
                            ->with('prescription_info',$prescription_info_by_id)
                            ->with('all_sub_category',$all_sub_category) 
                            ->with('all_medicine',$all_medicine);

        return view('admin.admin_master')
                    ->with('admin_main_content',$edit_prescription);

    }

    
    public function update_prescription(Request $request) {
        $data = array();

        $data['sub_category_id'] = $request->sub_category_id;
        $data['medicine_id'] = $request->medicine_id;
        $data['prescription_description'] = strip_tags($request->prescription_description);
        $prescription_id = $request->prescription_id;
        DB::table('tbl_prescription')
                ->where('prescription_id', $prescription_id)
                ->update($data);

        Session::put('message','Update prescription Successfully.');       
        return Redirect::to('manage-prescription');
    }

    public function delete_prescription($prescription_id){
        $this->super_admin_auth_check();
        DB::table('tbl_prescription')
                ->where('prescription_id',$prescription_id)
                ->delete();
        return redirect::to('manage-prescription');        
    }
//End prescription between Medicine and  sub_category





















    public function admin_logout(){
        Session::put('admin_id','');
        Session::put('admin_name','');
        Session::put('message','You are Successfully Logout.');
        return redirect::to('admin-panel');

    }


}





<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\FileUploadController;
use Input;

class EmployeeController extends Controller {

    protected function addEmp(request $request) {
        
        $post = $request->all();
  
        $fileupload = new FileUploadController();
        $fname = $fileupload->upload(Input::file('file'));
        
        if(isset($post['subscription'])){
            $sub = $post['subscription'];
        }else{
            $sub = 0;
        }
        
        $data = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
            'content' => $post['content'],
            'subscription' =>  $sub,
            'gender' => $post['gender'],
            'photo' => $fname,
            'type' => $post['type']
        );
    
        $i = DB::table('employee')->insert($data);
        if ($i > 0) {
            return redirect(url("emp"));
        } else {
            echo "news not inserted";
            die;
        }
    }

    protected function getEmp($empid = "") {
        if ($empid == "") {
            $result = DB::table('employee')->get();
            return view("layout/employee")->with('data', $result);
        } else {
            $result = DB::table('employee')->where('id', $empid)->get();
            return $result;
            die;
        }
    }
   
    protected function editEmp(request $request) {
        $post = $request->all();
        
        if(isset($post['oldimg'])){
            $fname = $post['oldimg'];
        }else{
            $fileupload = new FileUploadController();
            if(isset($post['oldimg'])){
                $oldfile = $post['oldphoto'];
                $path = app_path()."\uploads\\".$oldfile;
                if(file_exists($path)){
                    unlink($path);
                }
            }
            $fname = $fileupload->upload(Input::file('file'));
        }
        
        if(isset($post['subscription'])){
            $sub = $post['subscription'];
        }else{
            $sub = 0;
        }
        
        $data = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
            'content' => $post['content'],
            'subscription' => $sub,
            'gender' => $post['gender'],
            'photo' => $fname,
            'type' => $post['type']
        );
        
        $result = DB::table('employee')
                ->where('id', $post['emp_id'])
                ->update($data);

        
        return redirect(url("emp"));
        
    }
    
    protected function delEmp($empid = "") {
        if ($empid != "") {
            $result = DB::table('employee')->where('id', $empid)->delete();
            if ($result > 0) {
                echo "1";
                die;
            } else {
                echo "news not delete";
                die;
            }
        } else {
            echo "record not delete";
            die;
        }
    }
    
}

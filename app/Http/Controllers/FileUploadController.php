<?php
namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Request;
use Session;
class FileUploadController extends Controller {
    
public function upload($name) {
    
  $file = array('image' => $name);
  $rules = array('image' => 'required|mimes:doc,docx,jpeg,bmp,png'); //mimes:doc,docx,jpeg,bmp,png and for max size max:10
  
  $validator = Validator::make($file, $rules);
  
  if ($validator->fails()) {
    return false;
  }
  else {
    // checking file is valid.
    if ($name->isValid()) {
      $destinationPath = 'app/uploads'; // upload path
      $extension = $name->getClientOriginalExtension(); // getting image extension
      $fileName = rand(11111,99999).'.'.$extension; // renameing image
      $name->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message
      return $fileName;
    }
    else {
      echo "valid";die;
    }
  }
}

}
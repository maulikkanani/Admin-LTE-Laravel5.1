<?php

namespace App\Http\Controllers\news;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class NewsController extends Controller
{
   protected function addNews(request $request)
    {
		$post = $request->all();
		$data = array(
			'title' =>$post['title'],
			'description' =>$post['description'],
			'type' =>$post['type'],
		);
		$i = DB::table('news')->insert($data);
		if($i>0){
			return redirect(url("news"));
		}else{
				echo "news not inserted";
				die;
		}
    }
	protected function getNews($newsid = "")
    {
		if($newsid == ""){
			$headline = DB::table('news')->where('type', '1')->get();
			$general = DB::table('news')->where('type', '2')->get();
			$social = DB::table('news')->where('type', '3')->get();
			$sports = DB::table('news')->where('type', '4')->get();
			
			$data = array(
				'headline'=>$headline,
				'general'=>$general,
				'social'=>$social,
				'sports'=>$sports,
			);
			return view("layout/news")->with('data',$data);
		}else{
			$result = DB::table('news')->where('id', $newsid)->get();
			return $result;
			die;
		}
    }
	protected function editNews(request $request)
    {
		$post = $request->all();
		$data = array(
			'title' =>$post['title'],
			'description' =>$post['description'],
			'type' =>$post['type'],
		);
		$result = DB::table('news')
            ->where('id', $post['newsid'])
            ->update($data);
		
		if($result>0){
			return redirect(url("news"));
		}else{
			echo "news not update";
			die;
		}
	}
	protected function delNews($newsid = "")
    {
		if($newsid != ""){
			$result = DB::table('news')->where('id',$newsid)->delete();
			if($result>0){
				echo "1";
				die;
			}else{
				echo "news not delete";
				die;
			}
		}else{
			echo "record not delete";
			die;
		}
		
	}
	
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class indexcontroller extends Controller
{
    public function index(){
    	$post=DB::table('posts')->join('categories','posts.category_id','categories.id')
    	->select('posts.*','categories.name','categories.slug')->paginate(3);
    	return view('pages.index',compact('post'));
    }


     public function viewpost($id){
     	$post=DB::table('posts')
     	->join('categories','posts.category_id','categories.id')
     	->select('posts.*','categories.name')
     	->where('posts.id',$id)
     	->get();
     	  return view('pages/posts.viewpost',compact('post')); 
   	
   }

}

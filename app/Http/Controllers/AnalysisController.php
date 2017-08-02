<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Input;
use App\insertModel;
use Auth;
use Storage;


class AnalysisController extends Controller
{
    //
     public function admin()
    {
        
        $least=DB::table('tags')->get();
        //Storage::put('file.txt',$least);
        //return $least[0]->content;
        return view('admin',compact('least'));


    }
    public function adminpanel()
    {
        $arr = array_fill(0, 1000, 0);
        $least=DB::table('pos_data_table')->get();
        $tags = DB::table('tags')->get();
      
        foreach($tags as $tmp)
        {
            $arr[$tmp->s_id]++;


        }
        for($i =0;$i<=375; $i++)
        {

            DB::table('counter')->where('id',$i) ->update(['ct' => $arr[$i] ]);
        
        }

        return view('adminpanel',compact('least','arr'));


    }
    public function leaderboard()
    {
        
        $least=DB::table('tags')->where('view','2')->orderBy('username', 'asc')->get();
       // Storage::put('file.txt',$least);
        ////return $least[0]->content;
        //return $least;
        $flag = 'Current';
        return view('leaderboard',compact('least','flag'));


    }
    public function leaderboardall()
    {
        
        $least=DB::table('tags')->orderBy('username', 'asc')->get();
        //Storage::put('file.txt',$least);
        ////return $least[0]->content;
        //return $least;
          $flag = 'All-Time';
        return view('leaderboard',compact('least','flag'));


    }
     public function profilematrix($id)
    {
    	$least=DB::table('pos_data_table')->where('id',$id)->get();
    	//return $least[0]->content;
        $arr = $least[0]->content;
$tags=DB::table('tags')->where('s_id',$id)->get();
$pieces = explode(" ", $least[0]->content);
      return view('profilematrix',compact('pieces','tags'));


    }
    public function alldata($id,$id2)
    {
    	$least=DB::table('pos_data_table')->where('id', '>=',$id)->where('id', '<',$id2)->get();

       	$tags=DB::table('tags')->get();

      return view('alldata',compact('least','tags'));


    }
}

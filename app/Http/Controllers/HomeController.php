<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Input;
use App\insertModel;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $least_used=DB::table('counter')->orderBy('ct','asc')->get();
         DB::table('counter')->where('id',$least_used[0]->id) ->update(['ct' => $least_used[0]->ct+1])
        ;
        $sentence_list= DB::table('pos_data_table')->where('id',$least_used[0]->id)->get();

        $ind= $least_used[0]->id;
        
        $pieces = explode(" ", $sentence_list[0]->content);
       
      
        $current = Carbon::now();

   
        return view('home',compact('pieces','ind','current'));
       
    }
    

    public function store(Request $request){
        

        $data = $request->all();
        $str = "";
        $current = Carbon::now();
        $prev= $data['tm'];
      
       
        for($i=0;$i<$data['sz'];$i++)
        {
            $str =  $str.$data[$i]."-";
        }
        //return $str.$data['wordindex'];
       
       

         $dt=array(
                    's_id' => $data['wordindex'],
                    'tag' => $str,
                    'username' => Auth::user()->name,
                    'send_time' => $prev,
                    'received_time' =>  $current->toTimeString(),
                    'view' =>'1'




                    );

        InsertModel::insert($dt);
        

     
        return redirect()->route('home');
       
    }

}

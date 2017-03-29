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
    public function backindex($id,$str)
    {

        
        $sentence_list= DB::table('pos_data_table')->where('id',$id)->get();

        $ind= $id;
        
        $pieces = explode(" ", $sentence_list[0]->content);
        $tags = explode("-", $str);
      
        $current = Carbon::now();

   
        return view('home3',compact('pieces','ind','current','tags'));
       
    }
    

    public function store(Request $request){
        

        $data = $request->all();
        $str = "";
        $current = Carbon::now();
        $prev= $data['tm'];
        $id = $data['wordindex'];
        $sentence_list= DB::table('pos_data_table')->where('id',$id)->get();
        $sent = $sentence_list[0]->content;
    
        for($i=0;$i<$data['sz'];$i++)
        {
            $str =  $str.$data[$i]."-";
        }
        //return $str.$data['wordindex'];
        $tags = explode("-", $str);
        $pieces = explode(" ", $sent);


       return view('test')
        ->with('str',$str)
        ->with('tags', $tags)
        ->with('ind',$id)
        ->with('prev', $prev)
        ->with('pieces', $pieces);
       





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

     public function finalStore(Request $request){

        $data = $request->all();
        $str = $data['tg'];
        $id = $data['wordindex'];
        $prev= $data['prev'];

      //  return $id.$str.$prev;

        $current = Carbon::now();
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



    public function edit(){
        
        
        $data = $requst->all();
        return $data['tm'];
    }

}

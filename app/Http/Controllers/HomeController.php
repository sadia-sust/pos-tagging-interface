<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Input;
use App\insertModel;
use App\insertModel2;
use Auth;
use Storage;
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
    public function admin()
    {
        
        $least=DB::table('pos_data_table')->get();
        Storage::put('file.txt',$least);
        return $least[0]->content;
        return view('admin',compact('least'));


    }

    public function index2()
    {

         $least_used=DB::table('counter')->orderBy('ct','asc')->get();
         DB::table('counter')->where('id',$least_used[0]->id) ->update(['ct' => $least_used[0]->ct+1])
        ;
        $sentence_list= DB::table('pos_data_table')->where('id',$least_used[0]->id)->get();

        $ind= $least_used[0]->id;
        
        $pieces = explode(" ", $sentence_list[0]->content);
        $tag_count= DB::table('tags')->where('username',Auth::user()->name)->count();

        
        $current = Carbon::now();

    
        return view('home4',compact('pieces','ind','current','tag_count'));
       
    }

    public function index()
    {

         $least_used=DB::table('counter')->orderBy('ct','asc')->get();
         DB::table('counter')->where('id',$least_used[0]->id) ->update(['ct' => $least_used[0]->ct+1]);
        $sentence_list= DB::table('pos_data_table')->where('id',$least_used[0]->id)->get();

        $ind= $least_used[0]->id;
        
        $pieces = explode(" ", $sentence_list[0]->content);
        $tag_count= DB::table('tags')->where('username',Auth::user()->name)->count();

        
        $current = Carbon::now();

    
        return view('home',compact('pieces','ind','current','tag_count'));
       
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

    public function store2(Request $request){
        

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


       // return view('test')
       //  ->with('str',$str)
       //  ->with('tags', $tags)
       //  ->with('ind',$id)
       //  ->with('prev', $prev)
       //  ->with('pieces', $pieces);
       





         $dt=array(
                    's_id' => $data['wordindex'],
                    'tag' => $str,
                    'username' => Auth::user()->name,
                    'send_time' => $prev,
                    'received_time' =>  $current->toTimeString(),
                    'view' =>'2'




                    );
         //return $dt;
        InsertModel2::insert($dt);
        

     
        return redirect()->route('home2');
       
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
                    'view' =>'2'




                    );

        InsertModel2::insert($dt);
        

     
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
                    'send_time' =>$prev,
                    'received_time' =>  $current->toTimeString(),
                    'view' =>'2'




                    );
        $cheater= DB::table('tags')->where('s_id',$data['wordindex'])->where( 'username',Auth::user()->name)->get();
        if(count($cheater)>=1)
            return "Please Dont submit same document twice!";
        InsertModel::insert($dt);


        return redirect()->route('home');


     }



    public function edit(){
        
        
        $data = $requst->all();
        return $data['tm'];
    }

}

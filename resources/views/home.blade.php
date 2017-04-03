@extends('layouts.app')

@section('content')
<div>
<h4>You have Tagged {{$tag_count}} documents yet</h4>
</div>
<div class="container">
<div class="row">
<div class="col-md-8">

</div>
<div class="row">
<div class="col-md-8">

<p ><strong>Tag the sentences:</strong></p>
<h4> 
<strong>
<i>
"
   @for($i=0;$i<count($pieces);$i++)
   {{$pieces[$i]}}
   @endfor
   "
  </i>
  </strong>
</h4>
</div>
 <div class="col-md-3" style="border: 2px solid red;border-radius: 10px;margin-bottom: 10px;">
     Legend: <br>
     NN বিশেষ্য  &nbsp  &nbsp  &nbsp  PR সর্বনাম  <br>
     DM নির্দেশক  &nbsp  &nbsp  V ক্রিয়া  <br>
     JJ বিশেষণ  &nbsp  &nbsp  RB ক্রিয়া বিশেষণ  <br>
     PSP অনুসর্গ  &nbsp  CC সংযোজক  <br>
     RP অব্যয়  &nbsp  &nbsp  &nbsp  QT পরিমানবাচক  <br>
     PNC যতিচিহ্ন  &nbsp  RD অন্যান্য  <br>
  
     </div>
</div>
    <div class="row">

        <div class="col-md-12 ">

            <div  >
               
                {!! Form::open([
                        'route' => 'store',
                        'method' => 'post'
                      ]) 
                    !!}
                    
                <input type="hidden" value="{{$ind}}" name="wordindex" id="wordindexx" />
                               
                <input type="hidden" value="{{count($pieces)}}" name="sz" id="word" />

                <input type="hidden" value="{{$current->toTimeString()}}" name="tm" id="tm" />

 
                <div class="row" style="border: 2px solid grey;box-shadow: 8px 8px 5px #888888; padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;">
                
                        @for($i=0;$i<count($pieces);$i++)
                        @if($pieces[$i] =="।" || $pieces[$i] =="?" || $pieces[$i] =="!")
                        </div>
                        <input type="hidden" value="।" name="{{$i}}" id="{{$i}}" />
                       <div class="row" style="border: 2px solid grey;box-shadow: 8px 8px 5px #888888; padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;">

                        
                         @elseif($pieces[$i] =="")
                         <input type="hidden" value="।" name="{{$i}}" id="{{$i}}" />
                         @else
                        <div class="col-md-1" style="padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;margin-right: 10px;margin-left: 10px;margin-top: 10px;">
                        <p>  {{  $pieces[$i]}} </p>
                                
                             <select name="{{$i}}"  required="" >  
                                
                                 <option value=""> </option> 
                                 <option value="NN"> NN</option>
                                 <option value="PR">PR</option>
                                 <option value="DM">DM</option>
                                 <option value="V"> V</option>
                                 <option value="JJ">JJ</option>
                                  <option value="RB"> RB</option>
                                 <option value="PSP">PSP</option>
                                <option value="CC">CC</option>
                                 <option value="RP">RP</option>
                                  <option value="QT">QT</option>
                                   <option value="PNC">PNC</option>
                                    <option value="RD">RD</option>


  
  


                            </select>  
                         </div>
                       @endif
                        @endfor
                          

                    {!! Form::submit('Add', ['class'=>'form-control btn btn-success' ]) !!}

                    {!! Form::close() !!}
                    
                     
                </div>

                <!-- <div class="panel-body">
                    {!! Form::open([
                        'route' => 'store',
                        'method' => 'post'
                      ]) 
                    !!}

                    {!! Form::text('food_name', null, [
                        'class' => 'form-control', 
                        'placeholder' => 'Food name', 
                        'required']
                        )
                    !!}

                    {!! Form::text('food_callory', null, [
                        'class' => 'form-control', 
                        'placeholder' => 'Callory in 100 gram', 
                        'required']
                        )
                    !!}

                    {!! Form::submit('Add', ['class'=>'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </div> -->
            </div>
            <marquee
            style="width:100%;margin-top:1%;position:absolute;"
            behavior="scroll"
            direction="left"
            speed="slow">
                          
              <h3 style="color:black">For bengali tag set examples, <a href="http://10.100.32.154:8000/help.pdf" target="_blank">CLICK HERE</a></h3>
              
       </marquee>
        </div>
    </div>
</div>
@endsection

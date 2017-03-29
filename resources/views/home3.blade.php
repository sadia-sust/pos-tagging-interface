@extends('layouts.app')

@section('content')
<div class="container">
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
                                
                             <select name="{{$i}}" >  
                                
                                 <option value="NN" @if($tags[$i] == 'NN')
                                    selected 
                                   @endif> NN</option>
                                 <option value="PR" @if($tags[$i] == 'PR')
                                    selected 
                                   @endif>PR</option>
                                 <option value="DM" @if($tags[$i] == 'DM')
                                    selected 
                                   @endif >DM</option>
                                 <option value="V"  @if($tags[$i] == 'V')
                                    selected 
                                   @endif> V</option>
                                 <option value="JJ" @if($tags[$i] == 'JJ')
                                    selected 
                                   @endif >JJ</option>
                                  <option value="RB" @if($tags[$i] == 'RB')
                                    selected 
                                   @endif > RB</option>
                                 <option value="PSP" @if($tags[$i] == 'PSP')
                                    selected 
                                   @endif >PSP</option>
                                <option value="CC"  @if($tags[$i] == 'CC')
                                    selected 
                                   @endif>CC</option>
                                 <option value="RP"  @if($tags[$i] == 'RP')
                                    selected 
                                   @endif>RP</option>
                                  <option value="QT" @if($tags[$i] == 'QT')
                                    selected 
                                   @endif >QT</option>
                                   <option value="PNC"  @if($tags[$i] == 'PNC')
                                    selected 
                                   @endif>PNC</option>
                                    <option value="RD"  @if($tags[$i] == 'RD')
                                    selected 
                                   @endif>RD</option>










                                 <option value="NN" 
                                   
                                   @if($tags[$i] == 'NN')
                                    selected 
                                   @endif
                                > NN</option>
                                 <option value="PN"
                                 @if($tags[$i] == 'PN')
                                    selected 
                                   @endif
                                 >PN</option>
                                 <option value="VB" @if($tags[$i] == 'VB')
                                    selected 
                                   @endif> VB</option>
                                 <option value="ADJ" @if($tags[$i] == 'ADJ')
                                    selected 
                                   @endif> ADJ</option>
                                 <option value="ADV" @if($tags[$i] == 'ADV')
                                    selected 
                                   @endif>ADV</option>
                                  <option value="RP" @if($tags[$i] == 'RP')
                                    selected 
                                   @endif> RP</option>
                                 <option value="CC" @if($tags[$i] == 'CC')
                                    selected 
                                   @endif> CC</option>
                                 <option value="RD" @if($tags[$i] == 'RD')
                                    selected 
                                   @endif >RD</option>


  
  


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
        </div>
    </div>
</div>
@endsection

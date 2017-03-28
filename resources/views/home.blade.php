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
                        @if($pieces[$i] =="।")
                        </div>
                        <input type="hidden" value="।" name="{{$i}}" id="{{$i}}" />
                       <div class="row" style="border: 2px solid grey;box-shadow: 8px 8px 5px #888888; padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;">

                        
                         @elseif($pieces[$i] =="")
                         <input type="hidden" value="।" name="{{$i}}" id="{{$i}}" />
                         @else
                        <div class="col-md-1" style="padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;margin-right: 10px;margin-left: 10px;margin-top: 10px;">
                        <p>  {{  $pieces[$i]}} </p>
                                
                             <select name="{{$i}}">
                                 <option value="NN"> NN</option>
                                 <option value="PN">PN</option>
                                 <option value="VB"> VB</option>
                                 <option value="ADJ"> ADJ</option>
                                 <option value="ADV">ADV</option>
                                  <option value="RP"> RP</option>
                                 <option value="CC"> CC</option>
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
        </div>
    </div>
</div>
@endsection

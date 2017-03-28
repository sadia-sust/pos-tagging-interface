@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h4>Crowd Sourcing for Bengali POS Tagging</h4>
</div>
</div>
    <div class="row">
     
        <div class="col-md-12">
            <div class="panel panel-default" style="border: 2px solid grey;box-shadow: 8px 8px 5px #888888; padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;">
               
                {!! Form::open([
                        'route' => 'store',
                        'method' => 'post'
                      ]) 
                    !!}
                    
<input type="hidden" value="{{$ind}}" name="wordindex" id="wordindexx" />
               
<input type="hidden" value="{{count($pieces)}}" name="sz" id="word" />
<input type="hidden" value="{{$current->toTimeString()}}" name="tm" id="tm" />
                <div class="row">
                <div class="col-md-1"></div>
                        @for($i=0;$i<count($pieces);$i++)

                        <div class="col-md-2" style="border: 2px solid grey;padding-bottom: 10px;padding-top: 10px;padding-left: 10px;padding-right: 10px;margin-bottom: 10px;margin-right: 10px;margin-left: 10px;margin-top: 10px;">
                        <p>  {{  $pieces[$i]}} </p>
                                <input type="radio" name="{{$i}}" value="NN"> NN<br>
                                  <input type="radio" name="{{$i}}" value="PN"> PN<br>
                                  <input type="radio" name="{{$i}}" value="ADJ"> ADJ<br>
                                   <input type="radio" name="{{$i}}" value="VB"> VB<br>
                                  <input type="radio" name="{{$i}}" value="ADV"> ADV<br>
                                  <input type="radio" name="{{$i}}" value="RP"> RP<br>
                                   <input type="radio" name="{{$i}}" value="CC"> CC<br>
                                  <input type="radio" name="{{$i}}" value="RD"> RD<br>
                                  
                         
                         </div>
                       
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



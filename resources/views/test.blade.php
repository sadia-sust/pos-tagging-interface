@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-2"  style="border: 2px solid grey;border-radius: 10px;margin-bottom: 10px;">

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
<div class="col-md-6 col-md-offset-2" >
	 Sentence
    {!! Form::open([
                        'route' => 'finalStore',
                        'method' => 'post'
                      ]) 
                    !!}

            <input type="hidden" value="{{$ind}}" name="wordindex" id="wordindexx" />
                               
	        <input type="hidden" value="{{$prev}}" name="prev" id="word" />

	        <input type="hidden" value="{{$str}}" name="tg" id="tm" />


     @for($i=0;$i<count($pieces);$i++)
          @if($tags[$i] != "।")
           {{ $pieces[$i] }}( {{$tags[$i] }}) 
          @else 
           {{ $pieces[$i] }}
          @endif
      @endfor

    </br> </br>
    <a  class="btn btn-danger" href="{!! route('home.back',[$ind,$str]) !!}">Back</a>
    
    <input class="form-control btn btn-success" type="submit" value="Confirm" style="width: 20%">

     {!! Form::close() !!}

</div>
</div>

</div>
@stop
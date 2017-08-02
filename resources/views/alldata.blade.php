@extends('layouts.admin')

@section('content')
<div>


	        
	         @foreach($least as $tmp)
		         @php
		       	$pieces = explode(" ", $tmp->content);
		         @endphp
		         @for($i=0;$i<count($pieces);$i++)
		    
			        {{$pieces[$i]}}  
			         @foreach($tags as $tm)	
				         @php
				       		$pieces2 = explode("-", $tm->tag);
				         @endphp
				         @if ($tm->s_id==$tmp->id && $i<count($pieces2))
				         {{$pieces2[$i]}}-
				         @endif
			         @endforeach
			          <br>
		         @endfor
	         @endforeach
	        
</div>
@endsection

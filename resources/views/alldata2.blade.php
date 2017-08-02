@extends('layouts.admin')

@section('content')
<div>


	        
	         @foreach($tags as $tmp)
		        
		        
		    
			   
		
				     
				        {{$tmp->view}}
				        {{$tmp->tag}}


			        
			          <br>
		      
	         @endforeach
	        
</div>
@endsection

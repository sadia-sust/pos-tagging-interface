@extends('layouts.admin')

@section('content')
<div>
@php
$ar = ['NN', 'PR','DM' ,'V','JJ' ,'RB' ,'PSP','CC' ,'RP', 'QT', 'PNC','RD'];
@endphp

<p> Profile Matrix for Document: 260</p> 
<strong>
@for($i=0;$i<count($pieces);$i++)

	               	
                       <th> {{$pieces[$i]}} </th>
                       @if($pieces[$i]=='।')
                       @break
                       @endif
	
                    @endfor
 </strong>

<table id="admin" class="display"  cellspacing="0" >
	         <thead>
	         <th>Username</th>
	               @for($i=0;$i<count($pieces);$i++)

	               	
                       <th> {{$pieces[$i]}} </th>
	
                    @endfor
	         </thead>
	         <tbody>
	      
	         @foreach($tags as $tmp)

	         @php
	         $exp =  explode("-", $tmp->tag);
	         @endphp
	         <tr>
	               <td>{{$tmp->username}} </td>
	           @for($i=0;$i<count($exp);$i++)
                       <td>{{$exp[$i]}} </td>
				@endfor
              </tr>
	          
	         @endforeach
	         </tbody>
         </table>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div >
		<table id="admin" class="display"  cellspacing="0" >
	         <thead>
	            <th>registration</th>
	         </thead>
	         <tbody>
	        
	         @foreach($least as $tmp)
	          <tr>
	          <td>
	          {{$tmp->username}}
	          </td>
	         </tr>
	         @endforeach
	         </tbody>
         </table>
 </div>
  @endsection
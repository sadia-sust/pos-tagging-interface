@extends('layouts.admin')

@section('content')
<div >
		<table id="admin" class="display"  cellspacing="0" >
	         <thead>
	            <th>username</th>
	            <th>Document ID</th>
	            <th>Profile Martix</th>

	         </thead>
	         <tbody>
	        
	         @foreach($least as $tmp)
	          <tr>
	          <td>
	          {{$tmp->username}}
	          </td>
	           <td>
	          {{$tmp->s_id}}
	          </td>
	           <td >
                                
                                <a href="{!! route('profilematrix',[$tmp->s_id]) !!}" class="btn btn-success" style="margin-right: 3px;text-decoration:none">View
                                </a>
                                 </td>
	         </tr>
	          
	         @endforeach
	         </tbody>
         </table>
 </div>
  @endsection
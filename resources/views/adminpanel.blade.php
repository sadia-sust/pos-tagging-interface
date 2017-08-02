@extends('layouts.admin')

@section('content')
<div class="container">
<a class="btn btn-success" style="width: 200px;height: 50px;" href="{!! route('admin') !!}" > View all tags By users</a>

</div>

<table id="admin" class="display"  cellspacing="0" >
	         <thead>
	            <th>ID</th>
	            <th> Tag Count</th>
	             <th>Profile Martix</th>
	            <th>Document</th>
	          
	         </thead>
	         <tbody>
	        
	         @foreach($least as $tmp)
	          <tr>
	          <td>
	          {{$tmp->id}}
	          </td>
	          <td> 
				
	          {{$arr[$tmp->id]}}</td>
	          <td >
                                
                                <a href="{!! route('profilematrix',[$tmp->id]) !!}" class="btn btn-success" style="margin-right: 3px;text-decoration:none">View
                                </a>
                                 </td>
	           <td>
	          {{$tmp->content}}
	          </td>
	           
	         </tr>
	          
	         @endforeach
	         </tbody>
         </table>
@endsection
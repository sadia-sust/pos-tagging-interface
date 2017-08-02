@extends('layouts.leaderboard')

@section('content')
<div >
<h3>{{$flag}} Standings</h3>
<a href="{!! route('leaderboard2')!!}" class="btn btn-default" style="margin-right: 3px;text-decoration:none">View all time standings</a>
<a href="{!! route('home')!!}" class="btn btn-default" style="margin-right: 3px;text-decoration:none">Go to Homepage</a>
                                </a>
	<table id="admin" class="display"  cellspacing="0" >
		<thead>
			<th>Regi</th>
			<th>Tagged Document</th>
		</thead>
		<tbody>
			@php
				$prev = $least[0]->username;
				$ct=1;
			@endphp
			@for($i =1;$i<count($least);$i++)
				@if($least[$i]->username==$prev)
					@php
						$ct++;
					@endphp
				@else
					<tr>
						<td>
							{{$least[$i-1]->username}}
						</td>
						<td>
							{{$ct}}
						</td>
						@php
							$prev = $least[$i]->username;
							$ct=1;
						@endphp
					</tr>
				@endif
			@endfor
			<tr>
			<td>
				{{$prev}}
			</td>
			<td>
				{{$ct}}
			</td>
			</tr>
		</tbody>
	</table>
</div>
  @endsection
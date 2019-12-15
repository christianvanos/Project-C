@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<h1>Daily Scrums</h1>
<br><br>
Sprint: {{$sprint->number}}

<table class="table">
		    <thead>
				<tr>
					<th>Name</th>
					<th>is doing</th>
					<th>has done</th>
                    <th>errors</th>
				</tr>
			</thead>
    <tbody>
    @foreach($daily_scrums as $daily_scrum)
        <tr>
            <td>{{$members[$daily_scrum->member_id]}}</td>
            <td style="word-break:break-all;">{{$daily_scrum->is_doing}}</td>
            <td style="word-break:break-all;">{{$daily_scrum->has_done}}</td>
            <td style="word-break:break-all;">{{$daily_scrum->errors}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>    
    

 
@endsection
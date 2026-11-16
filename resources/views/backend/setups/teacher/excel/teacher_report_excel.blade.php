<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teacher List</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th style="font-weight:bold;"> SL</th>
				<th style="font-weight:bold;"> Name</th>
				<th style="font-weight:bold;"> Mobile No</th>
				<th style="font-weight:bold;"> Class</th>
				<th style="font-weight:bold;"> School Name</th>
				<th style="font-weight:bold;"> Designation</th>
				<th style="font-weight:bold;"> Gender</th>
				<th style="font-weight:bold;"> Address</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pdata as $key => $data)
			@php
				$group = App\Model\TeacherClass::where('id',$data['teacher_class_id'])->first();
			@endphp
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$data['name']}}</td>
				<td>{{$data['mobile']}}</td>
				<td>{{@$group->name}}</td>
				<td>{{$data['school_name']}}</td>
				<td>{{$data['designation']}}</td>
				<td>{{$data['gender']}}</td>
				<td>{{$data['address']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
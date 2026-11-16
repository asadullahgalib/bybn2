<!DOCTYPE html>
<html>
<head>
	<title>Employee list report</title>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		h2 h3{
			margin: 0;
			padding: 0;
		}
		.table{
			width: 100%;
			margin-bottom: 1rem;
			background-color: transparent;
		}
		.table th,
		.table td{
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}
		.table thead th{
			vertical-align: bottom;
			border-bottom: 2px solid #dee2e6;
		}
		.table tbody + tbody{
			border-top: 2px solid #dee2e6;
		}
		.table .table{
			background-color: #fff;
		}
		.table-bordered {
			border: 1px solid #dee2e6;
		}
		.table-bordered th,
		.table-bordered td{
			border: 1px solid #dee2e6;
		}
		.table-bordered thead th,
		.table-bordered thead td{
			border-bottom-width: 2px;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		table tr td{
			padding: 1px 0px 1px 10px;
		}
		.table-bordered thead th,
		.table-bordered td,
		.table-bordered th{
			border: 1px solid black !important;
		}
		.table-bordered thead th{
			background-color: #cacaca;
		}
		@page {
	      odd-header-name: odd-header;
	      even-header-name: even-header;
	      odd-footer-name: odd-footer;
	      even-footer-name: even-footer;
	    }		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
		        <table width="100%">
		          <tr>
		            <td width="2%" class="text-center">
		              
		            </td>
		            <td class="text-center" width="80%">
		              <img src="{{(!empty(@$school->image))?url('public/upload/contact_images/'.@$school->image):url('public/upload/no_image.png')}}" style="width: 120px;">

		              <h3 class="bang" style="font-size:22px;font-weight: bold;"><strong>{{ $school->name_en }}</strong></h3>
		                    <p style="font-size:15px;margin-bottom: 5px;">{{ $school->address_en }} </p>
		                    <p style=""> {{ $school->mobile_en }} </p>
		                    <p style="font-size:14px;padding-top:10px;"> Web:jsgrammarhighschool.com</p>
		            </td>
		            <td width="20" class="text-center">
		              
		            </td>
		          </tr>
		        </table>
		      </div>
			<div class="col-md-12 text-center">
				<h5 class="bang" style="font-weight: bold; padding-top: -20px;font-size: 20px;margin-bottom: 15px;">Employee List</h5>
			</div>
			<div class="col-md-12">
				<table class="table table-sm table-bordered" width="100%" style="padding-top:20px;">
					<thead>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Department</th>
							<th>Designation</th>
							<th>Present Address</th>
							<th>Image</th>
						</tr>
					</thead>
					<tbody>
						@foreach($allData as $key=> $value)
						<tr>
							<td style="text-align:center;">{{$value->sort}}</td>
							<td style="text-align:center;">{{$value->name}}</td>
							<td style="text-align:center;">{{$value->mobile}}</td>
							<td style="text-align:center;">{{ @$value['department']['name'] }}</td>
							<td style="text-align:center;">{{ @$value['designation']['name'] }}</td>
							<td style="text-align:center;">{{ $value->present_address }}</td>
							<td style="text-align:center;">
								<img src="{{(!empty(@$user->image))?url('public/upload/employee_images/'.@$user->image):url('public/upload/no_image.png')}}" style="width: 90px; height: 90px;">
							</td>
						</tr>
						@endforeach
					</tbody>
				</table><br>
			</div>
	        @php
	          $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	        @endphp
			<div class="col-md-12">
		        <table border="0" width="100%">
		          <tbody>
		            <tr>
		              <td style="width: 30%"></td>
		              <td style="width: 30%"></td>
		              <td style="width: 40%; text-align: center;">
		                <img src="{{(!empty($school->signature))?url('public/upload/signature_images/'.$school->signature):url('public/upload/no_image.png')}}" style="width: 75px;padding-top: 3px;">
		                <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px;">
		                <p style="text-align: center;">{{ $school->authorized }}</p>
		              </td>
		            </tr>
		          </tbody>
		        </table>
		    </div>
		</div>		
	</div>
</body>
</html>
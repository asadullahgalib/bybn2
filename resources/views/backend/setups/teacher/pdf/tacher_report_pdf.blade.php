<!DOCTYPE html>
<html>
<head>
	<title>Teacher List</title>
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
			padding: 4px;
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
		body {
         	font-family: 'nikoshban',sans-serif;
       	}
       	span{
       		font-size: 15px;
       	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table width="80%">
					<tr>
						<td width="33%" class="text-center">
							<img src="{{(!empty(@$school->image))?url('public/upload/contact_images/'.@$school->image):url('public/upload/no_image.png')}}" style="width: 80px; height: 80px">
						</td>
						<td class="text-center" width="63%">
							<h4><strong>{{ $school->name_en }}</strong></h4>
							<h5><strong>{{ $school->address_en }}</strong></h5>
							<h6><strong><span>{{ $school->mobile_en }}</span></strong></h6>
						</td>
						<td class="text-center">
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Teacher List</h5>
			</div>
			<div class="col-md-12">
				<table border="1" width="100%">
					<thead>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Class</th>
							<th>School Name</th>
							<th>Designation</th>
							<th>Gender</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						@foreach($allData as $key => $data)
						<tr style="text-align:center;">
							<td>{{$key+1}}</td>
							<td>{{$data->name}}</td>
							<td>{{$data->mobile}}</td>
							<td>{{@$data['group']['name']}}</td>
							<td>{{$data->school_name}}</td>
							<td>{{$data->designation}}</td>
							<td>{{$data->gender}}</td>
							<td>{{$data->address}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }}</i>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
		        <htmlpagefooter name="odd-footer">
		          <div style="float:right; width: 1%;">
		            <!-- Received By <br> -->
		            <i style="font-size: 9px;">Developed By #Popularsoft IT, www.popularsoftbd.com,01928511049</i>
		          </div>
		          <div style="float:left; width: 3%; text-align: right;"></div>
		        </htmlpagefooter>
		    </div>
		</div>
	</div>
</body>
</html>
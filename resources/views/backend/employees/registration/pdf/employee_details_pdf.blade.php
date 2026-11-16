<!DOCTYPE html>
<html>
<head>
	<title>Employee Details</title>
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
	<div class="container" style="margin-top:-50px;">
		<div class="row">
			<div class="col-md-12">
				<table width="80%">
					<tr>
						<td width="33%" class="text-center">
							<img src="{{(!empty(@$school->image))?url('public/upload/contact_images/'.@$school->image):url('public/upload/no_image.png')}}" style="width: 90px; height: 90px">
						</td>
						<td class="text-center" width="63%">
							<h3 class="bang" style="font-size:25px;color:#373737"><strong>{{ $school->name_en }}</strong></h3>
				            <h4 class="bang" style="font-size:14px">{{ $school->address_en }} </h4>
				            <h4 style="font-size:14px"> {{ $school->mobile_en }} </h4>
				            <h6 style="font-size:14px"> Email: {{ $school->email }}</h6>
						</td>
						<td class="text-center">
							<img src="{{(!empty(@$user->image))?url('public/upload/employee_images/'.@$user->image):url('public/upload/no_image.png')}}" style="width: 90px; height: 90px;">
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-12 text-center">
				<h5 class="bang" style="font-weight: bold; padding-top: -20px;font-size: 20px;margin-bottom: 15px;">Employee Details Information</h5>
			</div>
			<div class="col-md-12">
                <strong>Official Information:</strong>
                <table class="table table-sm table-bordered" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%">Employee Name :</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Email/Mobile No :</td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Mobile No :</td>
                            <td>{{ $user->mobile }}</td>
                        </tr>                       
                        <tr>
                            <td style="width: 30%">Department :</td>
                            <td>{{ @$user['department']['name'] }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Designation :</td>
                            <td>{{ @$user['designation']['name'] }}</td>
                        </tr>
                        <!-- <tr>
                            <td style="width: 30%">User Role :</td>
                            <td>{{ $user['user_role']['role_name'] }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Join Date :</td>
                            <td>{{ date('d-m-Y',strtotime($user->join_date)) }}</td>
                        </tr> -->            
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <strong>Personal Information:</strong>
                <table class="table table-sm table-bordered" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%">Father's Name :</td>
                            <td>{{ $user->fname }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Mother's Name :</td>
                            <td>{{ $user->mname }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Date of Birth :</td>
                            <td>{{ date('d-m-Y',strtotime($user->dob)) }}</td>
                        </tr>                       
                        <tr>
                            <td style="width: 30%">Place of Birth :</td>
                            <td>{{ $user->birth_place }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Gender :</td>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Religion :</td>
                            <td>{{ @$user['religion']['name'] }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Nationality :</td>
                            <td>{{ $user->nationality }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">NID :</td>
                            <td>{{ $user->nid_no }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Blood Group :</td>
                            <td>{{ $user->blood_group }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Marital Status :</td>
                            <td>{{ $user->marital_status }}</td>
                        </tr>                   
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <strong>Contact Details:</strong>
                <table class="table table-sm table-bordered" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%">Present Address :</td>
                            <td>{{ $user->present_address }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Permanent Address :</td>
                            <td>{{ $user->permanent_address }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Emergency Contact Person :</td>
                            <td>{{ $user->emergency_contact_name }}</td>
                        </tr>                       
                        <tr>
                            <td style="width: 30%">Relation with His/Her :</td>
                            <td>{{ $user->relation_with }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Emergency Contact Person No :</td>
                            <td>{{ $user->emergency_contact_no }}</td>
                        </tr>                   
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <strong>Education Qualification:</strong>
                <table class="table table-sm table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Exam Name</th>
                            <th>Subject</th>
                            <th>Institue Name</th>
                            <th>Result</th>
                            <th>Passing Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($educations as $edu)
                        <tr>
                            <td>{{$edu->exam_name}}</td>
                            <td>{{$edu->subject}}</td>
                            <td>{{$edu->institute_name}}</td>
                            <td>{{$edu->result}}</td>
                            <td>{{$edu->passing_year}}</td>
                        </tr>
                        @endforeach         
                    </tbody>
                </table><br>
		        @php
		          $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		        @endphp
                <i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }}</i>
            </div>
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
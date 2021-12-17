<!DOCTYPE html>
<html>
<head>
	<title>PermitSearch</title>
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	th, td {
		padding: 5px;
		text-align: left;
	}
	#header-email h2{
		margin: 10px;
		background-color: black;
		padding: 10px 10px 10px 10px;
		color: white;
		text-align: center;
		border: 2px solid black;				
	}



	#header-content{
		
		padding: 10px 10px 10px 10px;
		color: dark;
		text-align: center;

	}
	table, td, th {
		border: 1px solid black;
		color: dark;

	}

	table {
		width: 100%;
		border-collapse: collapse;
	}
</style>
</head>
<body>
	<div id="header-email">
		<h2>PERMIT SEARCH</h2>
		<div id="header-content">	
			<h3>Requested Address Permit Found</h3>
			<div style="text-align: left; padding: 10px;">
				Hello {{ $details['first_name']??'' }}  {{ $details['last_name']??'' }},  <br/><br/>
				We found permit details, which you requested on date: {{ $details['created_at']??'' }}. Please login and confirm following requested permit details. 	
			</div>
			<div style="width: 90%;border:1px solid black; text-align:left; margin: 5px; padding: 10px;">
				<div style="max-width: 100%; text-align: center; padding: 4px; margin: 5px;background-color: lightgray; color: black;"> 
					Permit Request Details 
				</div><br/>
				<br/>
				<b> Street Address </b>: {{ $details['property_street_name']??'' }} <br/><br/>
				<b> City </b>: {{ $details['property_city']??'' }} <br/><br/>
				<b> State </b>: {{ $details['property_state']??'' }} <br/><br/>
				<b> Zip Code </b>: {{ $details['zip_code']??'' }}<br/><br/>
				<br/><br/><br/>
				Check Permit Requests Status : <a href="{{url('/dashboard/permit-requests')}}" target="_blank"> Click Here </a> <br/><br/>
				Check Approved/Found Permit Requests Address data : <a href="{{url('/dashboard/permit/my-report')}}" target="_blank"> Click Here </a>
			</div>
			<div style="text-align: left; padding: 10px;"> 
				<h4>Warm Regards,</h4>
				<p>Permit Search Team</p>
			</div>					
		</div>

	</div>

</body>
</html>
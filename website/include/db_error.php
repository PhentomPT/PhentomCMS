<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Database Error</title>
		<style>
			body{
				background: #fff;
				width: 80%;
				color: #666;
				margin: 5% auto;
			}
		
			.main{
				background: #fff;
				border: 1px solid #d1d1d1;
				box-shadow: 0 0 10px rgba(0,0,0,0.1);
			}
			
				.title{
					font-family: sans-serif;
					font-weight: 300;
					font-size: 18px;
					padding: 20px 10px;
					border-bottom: 1px solid #d1d1d1;
				}
				
				p{
					background: #fff;
					font-family: monospace;
					font-size: 12px;
					font-weight: lighter;
					padding: 3px 10px;
					word-break: break-all;
				}
			
			.footer{
				background: #fff;
				font-family: monospace;
				font-size: 12px;
				text-align: center;
				padding: 10px;
			}
			
				.support{
					color: #ff4040;
					text-decoration: none;
				}
			
				.phentom{
					color: #53b8f0;
					text-decoration: none;
				}
		</style>
	</head>
	<body>
		<?php 
			if (!empty($con->connect_errno)){ 
				$error_num = $con->connect_errno; 
			}
			elseif(!empty($query)){
				$error_num = "Query Error";
			}
			else{ 
				$error_num = "Undefined"; 
			}

			if (!empty($con->connect_error)){ 
				$error_text = "Error: ". $con->connect_error;
			}
			elseif(!empty($query)){
				$error_text = "Your query is: ". $query;
			}
			else{
				$error_text = "Error: Check the config file within the application that got this error";
			}
		?>
	
		<div class="main" align="left">
			<div class="title"><?php echo $error_num;?> - Database Error</div>
			<p><?php echo $error_text;?></p>
		</div>
		<div class="footer">
			<p>If your having trouble contact the <a class="support" target="_blank" href="http://phentom.net/support">Support</a> or <a class="support" target="_blank" href="https://github.com/PhentomPT/PhentomCMS" >Github</a></p>
		- Powered by <a class="phentom" target="_blank" href="http://phentom.net/">Phentom</a> -</div>
	</body>
</html>
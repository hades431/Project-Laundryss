<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign In | Aplikasi Pembayaran Laundry</title>
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<!-- Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
	<!-- Alert Logic -->
	<?php
	$alertMsg = '';
	$alertType = '';
	if(isset($_GET['alert'])){
		if($_GET['alert']=="gagal"){
			$alertMsg = "Maaf! Username & Password Salah.";
			$alertType = "bg-red-100 text-red-700 border-red-400";
		}else if($_GET['alert']=="belum_login"){
			$alertMsg = "Anda Harus Login Terlebih Dulu!";
			$alertType = "bg-yellow-100 text-yellow-700 border-yellow-400";
		}else if($_GET['alert']=="logout"){
			$alertMsg = "Anda Telah Logout!";
			$alertType = "bg-green-100 text-green-700 border-green-400";
		}
	}
	if($alertMsg){
		echo '<div class="fixed top-4 left-1/2 transform -translate-x-1/2 w-full max-w-md z-50">
			<div class="border-l-4 p-4 rounded shadow '.$alertType.'">'.$alertMsg.'</div>
		</div>';
	}
	?>
	<!-- Login Card -->
	<main class="w-full max-w-md mx-auto">
		<div class="bg-white rounded-lg shadow-lg p-8">
			<div class="text-center mb-6">
				<h3 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back!</h3>
				<p class="text-gray-500">Please login to your account.</p>
			</div>
			<form action="aksi.php" method="post" class="space-y-5">
				<div>
					<label class="block text-gray-700 mb-1" for="username">Username</label>
					<input type="text" id="username" name="username" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
				</div>
				<div>
					<label class="block text-gray-700 mb-1" for="password">Password</label>
					<input type="password" id="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
				</div>
				<button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition">Login</button>
			</form>
		</div>
	</main>
</body>
</html>
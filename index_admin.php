<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Laundry App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg px-8 py-4 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <span class="text-3xl font-bold text-blue-700">LAUNDRY'SS</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="index_admin.php" class="flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded font-semibold">
                <span class="material-icons text-blue-500 mr-1">dashboard</span>
                Dashboard
            </a>
            <a href="./admin/user.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">person</span>
                User
            </a>
            <a href="./admin/outlet.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">store</span>
                Outlet
            </a>
            <a href="./admin/paket.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">local_laundry_service</span>
                Paket Laundry
            </a>
            <a href="./admin/transaksi.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">receipt_long</span>
                Entri Transaksi
            </a>
            <a href="./admin/member.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">group_add</span>
                Registrasi Pelanggan
            </a>
            <a href="./admin/logout.php" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 font-bold text-white">
                Logout
            </a>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="p-8 max-w-7xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang Di LAUNDRY'SS</h1>
            <nav class="text-sm text-gray-500">
            </nav>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Welcome Card -->
            <div class="bg-white rounded shadow p-8 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-center mb-4">Welcome<br />To LAUNDRY'SS</h3>
                    <div class="text-center text-gray-600 mb-6">Anda login sebagai admin</div>
                </div>
            </div>
            <!-- Stats Card -->
            <div class="bg-white rounded shadow p-8">
                <h3 class="text-xl font-bold mb-4">Halaman Dashboard Admin</h3>
                <div class="text-gray-400 mb-6">Jumlah Data Family Laundry</div>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                    <div class="border border-dashed border-gray-300 text-center rounded p-6">
                        <span class="block text-gray-400 font-semibold mb-2">Jumlah Outlet</span>
                        <?php
                        include 'admin/koneksi.php';
                        $data_outlet = mysqli_query($conn,"SELECT * FROM outlet");
                        $jumlah_outlet = mysqli_num_rows($data_outlet);
                        ?>
                        <span class="text-3xl font-bold text-gray-800"><?php echo $jumlah_outlet; ?></span>
                    </div>
                    <div class="border border-dashed border-gray-300 text-center rounded p-6">
                        <span class="block text-gray-400 font-semibold mb-2">Jumlah Pelanggan</span>
                        <?php
                        include 'admin/koneksi.php';
                        $data_member = mysqli_query($conn,"SELECT * FROM member");
                        $jumlah_member = mysqli_num_rows($data_member);
                        ?>
                        <span class="text-3xl font-bold text-gray-800"><?php echo $jumlah_member; ?></span>
                    </div>
                    <div class="border border-dashed border-gray-300 text-center rounded p-6">
                        <span class="block text-gray-400 font-semibold mb-2">Jumlah User</span>
                        <?php
                        include 'admin/koneksi.php';
                        $data_user = mysqli_query($conn,"SELECT * FROM user");
                        $jumlah_user = mysqli_num_rows($data_user);
                        ?>
                        <span class="text-3xl font-bold text-gray-800"><?php echo $jumlah_user; ?></span>
                    </div>
                    <div class="border border-dashed border-gray-300 text-center rounded p-6">
                        <span class="block text-gray-400 font-semibold mb-2">Jumlah Pesanan</span>
                        <?php
                        include 'admin/koneksi.php';
                        $data_transaksi = mysqli_query($conn,"SELECT * FROM transaksi");
                        $jumlah_transaksi = mysqli_num_rows($data_transaksi);
                        ?>
                        <span class="text-3xl font-bold text-gray-800"><?php echo $jumlah_transaksi; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
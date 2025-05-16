<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Laundry App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!-- Tailwind CSS CDN -->
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
            <a href="../index_admin.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">dashboard</span>
                Dashboard
            </a>
            <a href="./user.php" class="flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded font-semibold">
                <span class="material-icons text-blue-500 mr-1">person</span>
                User
            </a>
            <a href="./outlet.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">store</span>
                Outlet
            </a>
            <a href="./paket.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">local_laundry_service</span>
                Paket Laundry
            </a>
            <a href="./transaksi.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">receipt_long</span>
                Entri Transaksi
            </a>
            <a href="./member.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">group_add</span>
                Registrasi Pelanggan
            </a>
            <a href="./logout.php" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 font-bold text-white">
                Logout
            </a>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="p-8 max-w-7xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit User Laundry App</h1>
            <nav class="text-sm text-gray-500">
                <ol class="list-reset flex">
                    <li><a href="index_admin.php" class="hover:text-blue-600">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li>Admin</li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-700 font-semibold">Edit User</li>
                </ol>
            </nav>
        </div>
        <!-- Edit User Form -->
        <div class="bg-white rounded shadow p-8 max-w-lg mx-auto">
            <?php 
                include "koneksi.php";
                $sql = 'select * from user where id_user = ' .$_GET['id_user'] ;
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
            ?>
            <form action="proses_ubah_user.php" method="post" class="space-y-6">
				<input type="hidden" name="id_user" value="<?= $data['id_user']?>">
                <div>
                    <label class="block text-gray-700 mb-1 font-semibold">Nama User<span class="text-red-500">*</span></label>
                    <input type="text" name="nama_user" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="<?= $data['nama_user']?>" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-1 font-semibold">Username<span class="text-red-500">*</span></label>
                    <input type="text" name="username" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="<?= $data['username']?>" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-1 font-semibold">Password<span class="text-red-500">*</span></label>
                    <input type="text" name="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="<?= $data['password']?>" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-1 font-semibold">Nama Outlet<span class="text-red-500">*</span></label>
                    <select name="id_outlet" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        <option value="">Pilih Outlet</option>
                        <?php
                            include "koneksi.php";
                            $qry_outlet=mysqli_query($conn,"select * from outlet");
                            while($data_outlet=mysqli_fetch_array($qry_outlet)){
                                $selek = ($data_outlet['id_outlet']==$data['id_outlet']) ? "selected" : "";
                                echo '<option value="'.$data_outlet['id_outlet'].'" '.$selek.'>'.$data_outlet['nama'].'</option>';   
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 mb-1 font-semibold">Role User<span class="text-red-500">*</span></label>
                    <input type="text" name="role" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="<?= $data['role']?>" required>
                </div>
                <div class="flex justify-end gap-2 pt-4">
                    <button type="submit" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-semibold">Simpan</button>
                    <a href="../admin/user.php" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold">Kembali</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
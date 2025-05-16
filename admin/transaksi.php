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
            <a href="index_admin.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
                <span class="material-icons text-blue-500 mr-1">dashboard</span>
                Dashboard
            </a>
            <a href="./user.php" class="flex items-center px-4 py-2 hover:bg-blue-50 rounded transition text-gray-700">
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
            <a href="./transaksi.php" class="flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded font-semibold">
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
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Transaksi Pembayaran</h1>
            <nav class="text-sm text-gray-500">
                <ol class="list-reset flex">
                    <li><a href="../index_admin.php" class="hover:text-blue-600">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li>Admin</li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-700 font-semibold">Transaksi</li>
                </ol>
            </nav>
        </div>
        <!-- Add Transaksi Button -->
        <div class="mb-6 flex justify-between items-center">
            <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition" onclick="document.getElementById('modalTransaksi').classList.remove('hidden')">
                Tambah Transaksi
            </button>
        </div>
        <!-- Transaksi Table -->
        <div class="bg-white rounded shadow p-6 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Outlet</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Batas Waktu</th>
                        <th class="px-4 py-2 text-left">Pembayaran</th>
                        <th class="px-4 py-2 text-left">Tanggal Dibayar</th>
                        <th class="px-4 py-2 text-left">Customer</th>
                        <th class="px-4 py-2 text-left">Paket</th>
                        <th class="px-4 py-2 text-left">Status Order</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    include "koneksi.php";
                    $qry_transaksi=mysqli_query($conn,"select * from transaksi JOIN outlet ON outlet.id_outlet = transaksi.id_outlet JOIN member ON member.id_member = transaksi.id_member JOIN paket ON paket.id_paket = transaksi.id_paket");
                    $no=0;
                    while($data_transaksi=mysqli_fetch_array($qry_transaksi)){
                    $no++;?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2"><?=$no?></td>
                        <td class="px-4 py-2"><?=$data_transaksi['nama']?></td>
                        <td class="px-4 py-2"><?=$data_transaksi['tgl']?></td>
                        <td class="px-4 py-2"><?=$data_transaksi['batas_waktu']?></td>
                        <td class="px-4 py-2"><?=$data_transaksi['dibayar']?></td>
                        <td class="px-4 py-2"><?=$data_transaksi['tgl_bayar']?></td>
                        <td class="px-4 py-2"><?=$data_transaksi['nama_member']?></td>
                        <td class="px-4 py-2"><?=$data_transaksi['nama_paket']?></td>
                        <td class="px-4 py-2"><?=$data_transaksi['status']?></td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="./admin/detail_transaksi.php?id_transaksi=<?php echo $data_transaksi['id_transaksi']?>" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition">
                                <span class="material-icons text-base">info</span>
                            </a>
                            <a href="./admin/hapus_transaksi.php?id_transaksi=<?=$data_transaksi['id_transaksi']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                                <span class="material-icons text-base">delete</span>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div id="modalTransaksi" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                <div class="flex justify-between items-center border-b px-6 py-4">
                    <h2 class="text-lg font-semibold">Tambah Transaksi Laundry</h2>
                    <button class="text-gray-400 hover:text-gray-700" onclick="document.getElementById('modalTransaksi').classList.add('hidden')">
                        <span class="material-icons">close</span>
                    </button>
                </div>
                <form method="POST" action="admin/proses_tambah_transaksi.php" enctype="multipart/form-data" class="px-6 py-4 space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-1">Id Transaksi</label>
                        <input type="text" name="id_transaksi" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Nama Outlet</label>
                        <select name="id_outlet" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Pilih Outlet</option>
                            <?php
                            include "koneksi.php";
                            $qry_outlet=mysqli_query($conn,"select * from outlet");
                            while($data_outlet=mysqli_fetch_array($qry_outlet)){
                                echo '<option value="'.$data_outlet['id_outlet'].'">'.$data_outlet['nama'].' | '.$data_outlet['alamat'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Nama Member</label>
                        <select name="id_member" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Pilih Member</option>
                            <?php
                            include "koneksi.php";
                            $qry_member=mysqli_query($conn,"select * from member");
                            while($data_member=mysqli_fetch_array($qry_member)){
                                echo '<option value="'.$data_member['id_member'].'">'.$data_member['nama_member'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Tanggal Order</label>
                        <input type="date" name="tgl" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Batas Waktu</label>
                        <input type="date" name="batas_waktu" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Nama Paket</label>
                        <select name="id_paket" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Pilih Paket</option>
                            <?php
                            include "koneksi.php";
                            $qry_paket=mysqli_query($conn,"select * from paket");
                            while($data_paket=mysqli_fetch_array($qry_paket)){
                                echo '<option value="'.$data_paket['id_paket'].'">'.$data_paket['nama_paket'].' | '.$data_paket['jenis'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Nama Petugas</label>
                        <select name="id_user" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Pilih Petugas</option>
                            <?php
                            include "koneksi.php";
                            $qry_user=mysqli_query($conn,"select * from user");
                            while($data_user=mysqli_fetch_array($qry_user)){
                                echo '<option value="'.$data_user['id_user'].'">'.$data_user['nama_user'].' | '.$data_user['role'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Status Order</label>
                        <input type="text" name="status" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Status Bayar</label>
                        <input type="text" name="dibayar" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700" onclick="document.getElementById('modalTransaksi').classList.add('hidden')">Batal</button>
                        <input type="submit" name="simpan" value="Tambah Transaksi" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-semibold cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
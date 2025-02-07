<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

    public function getDataFromApi() {
        // Tentukan URL API
        $url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';

        // Tentukan username
        $username = 'tesprogrammer070225C17';

        // Tentukan password sesuai format yang ditentukan
        $tanggal = date('j'); // Tanggal tanpa leading zero
        $bulan = date('n'); // Bulan tanpa leading zero
        $tahun = date('y'); // Dua digit terakhir tahun
        $password_plain = "bisacoding-{$tanggal}-{$bulan}-{$tahun}";
        $password = md5($password_plain);

        // Buat header Authorization
        $auth = base64_encode("{$username}:{$password}");
        $opts = array(
            'http' => array(
                'method' => 'GET',
                'header' => "Authorization: Basic {$auth}"
            )
        );
        $context = stream_context_create($opts);

        // Ambil data dari API
        $result = file_get_contents($url, false, $context);

        // Periksa apakah pengambilan data berhasil
        if ($result === FALSE) {
            // Tangani kesalahan
            echo "Gagal mengambil data dari API.";
            return;
        }

        // Ubah JSON menjadi array asosiatif
        $data = json_decode($result, true);

        // Tampilkan data (atau bisa diproses sesuai kebutuhan)
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
?>

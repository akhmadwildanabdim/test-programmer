<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('model_product');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    // Menampilkan semua produk
    public function index() {
        $data['produk'] = $this->model_product->get_all_produk();
        $this->load->view('produk/index', $data);
    }

    // Menampilkan hanya produk dengan status "bisa dijual"
    public function bisa_dijual() {
        /* In the provided PHP code snippet, the line ` ['produk'] =
        ->model_product->get->pduk_by_sts("bisa dijual");` seems to have a typo or incorrect
        method call. */
        $data['produk'] = $this->model_product->get_all_produk_bisa_dijual();
        $this->load->view('produk/bisa_dijual', $data);
    }

    // Form tambah produk
    public function tambah() {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('produk/tambah');
        } else {
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'kategori_id' => $this->input->post('kategori_id'),
                'status_id' => $this->input->post('status_id')
            ];
            $this->model_product ->insert_produk($data);
            redirect('produk');
        }
    }

    // Form edit produk
    public function edit($id) {
        $data['produk'] = $this->model_product ->get_produk_by_id($id);

        if (!$data['produk']) {
            show_404();
        }

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('produk/edit', $data);
        } else {
            $update_data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'kategori_id' => $this->input->post('kategori_id'),
                'status_id' => $this->input->post('status_id')
            ];
            $this->model_product ->update_produk($id, $update_data);
            redirect('produk');
        }
    }

    // Hapus produk dengan konfirmasi
    public function hapus($id) {
        $this->model_product ->delete_produk($id);
        redirect('produk');
    }
}
?>

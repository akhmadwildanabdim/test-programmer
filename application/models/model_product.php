<?php
class model_product extends CI_Model {
    private $table = 'Produk';

    public function get_all_produk($only_sellable = false) {
        if ($only_sellable) {
            $this->db->where('status_id', 1); // Misal: 1 adalah "bisa dijual"
        }
        return $this->db->get($this->table)->result();
    }

    public function get_produk_by_id($id) {
        return $this->db->get_where($this->table, ['id_produk' => $id])->row();


    }

    public function get_all_produk_bisa_dijual() {
        $this->db->select('produk.id_produk, produk.nama_produk, produk.harga, kategori.nama_kategori, status.nama_status');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori', 'left');
        $this->db->join('status', 'produk.status_id = status.id_status', 'left');
        $this->db->where('status.nama_status', 'bisa dijual'); // Hanya produk yang bisa dijual
        $query = $this->db->get();
        return $query->result();
    }
    
    

    public function insert_produk($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_produk($id, $data) {
        $this->db->where('id_produk', $id);
        return $this->db->update($this->table, $data);
    }
    
    public function delete_produk($id) {
        $this->db->where('id_produk', $id);
        return $this->db->delete($this->table);
    }
}

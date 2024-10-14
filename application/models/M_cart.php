<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

    private $table = 'cart';

    public function get_cart_items($pid) {
        return $this->db->get_where($this->table, array('pid' => $pid))->result();
        
    }
    
    public function get_product_details($product_id) {
        return $this->db->get_where('produk', array('id' => $product_id))->row();
    }
    public function checkout($pid, $selected_items) {
        // Loop melalui item yang dipilih dan proses pembayaran
        foreach ($selected_items as $item_id) {
            $item = $this->db->get_where($this->table, array('id' => $item_id, 'pid' => $pid))->row();
            if ($item) {
                // Lakukan logika pembayaran atau proses lain sesuai kebutuhan
                $this->remove_item($item_id); // Menghapus item dari keranjang setelah checkout
            }
        }
        return true; // Mengembalikan true jika checkout berhasil
    }

    public function jml_item_keranjang_user($pid) {
        $this->db->distinct();
        $this->db->select('product_id');
        $this->db->where('pid', $pid);
        return $this->db->get($this->table)->num_rows();
    }
    
    
    
    public function add_item($pid, $product_id) {
        $this->db->where('pid', $pid);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get($this->table);
    
        if ($query->num_rows() > 0) {
            // Jika produk sudah ada, tambahkan qty
            $this->db->set('qty', 'qty + 1', FALSE);
            $this->db->where('pid', $pid);
            $this->db->where('product_id', $product_id);
            $this->db->update($this->table); 
        } else {
            // Jika tidak ada, tambahkan item baru
            $data = array(
                'pid' => $pid,
                'product_id' => $product_id,
                'qty' => 1
            );
           $this->db->insert($this->table, $data);
        }
        
    }

    public function reduce_stock($product_id, $qty) {
        // Kurangi stok
        $this->db->set('stok', 'stok - ' . (int)$qty, FALSE);
        $this->db->where('id', $product_id);
        $this->db->update('produk');
    
        // Cek stok setelah pengurangan
        $product = $this->get_product_details($product_id);
        if ($product && $product->stok <= 0) {
            // Jika stok 0 atau kurang, hapus produk dari tabel 'produk'
            $this->db->delete('produk', array('id' => $product_id));
        }
    }
        
    
public function update_qty($item_id, $new_qty) {
    $item = $this->db->get_where($this->table, array('id' => $item_id))->row();
    $product = $this->get_product_details($item->product_id);
    
    $old_qty = $item->qty;
    $difference = $new_qty - $old_qty;

    if ($difference != 0) {
        // Kurangi atau tambah stok berdasarkan selisih qty
        $this->db->set('qty', $new_qty);
        $this->db->where('id', $item_id);
        if ($this->db->update($this->table)) {
            $this->reduce_stock($item->product_id, $difference); // Kurangi stok
            return true;
        }
    }
    return false;
}


    public function remove_item($item_id) {
        return $this->db->delete($this->table, array('id' => $item_id));
    }
}

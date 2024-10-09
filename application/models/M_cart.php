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

    public function get_cart_summary($pid) {
        // Ambil semua item keranjang
        $items = $this->get_cart_items($pid);
        
        $subtotal = 0;
        foreach ($items as $item) {
            $product = $this->get_product_details($item->product_id);
            if ($product) {
                $subtotal += $product->harga * $item->qty; // Asumsi ada field 'qty' di tabel keranjang
            }
        }

        // Estimasi ongkir dan pajak
        $estimasi_ongkir = 5.00; // Misal
        $estimasi_pajak = $subtotal * 0.0832; // Misal 8.32% pajak

        // Total
        $total = $subtotal + $estimasi_ongkir + $estimasi_pajak;

        return [
            'subtotal' => $subtotal,
            'estimasi_ongkir' => $estimasi_ongkir,
            'estimasi_pajak' => $estimasi_pajak,
            'total' => $total,
        ];
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
            if ($this->db->update($this->table)) {
                $this->reduce_stock($product_id, 1); // Kurangi stok
                return true;
            }
            return false;
        } else {
            // Jika tidak ada, tambahkan item baru
            $data = array(
                'pid' => $pid,
                'product_id' => $product_id,
                'qty' => 1
            );
            if ($this->db->insert($this->table, $data)) {
                $this->reduce_stock($product_id, 1); // Kurangi stok
                return true;
            }
            return false;
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

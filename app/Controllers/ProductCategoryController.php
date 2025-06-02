<?php

namespace App\Controllers;

use App\Models\ProductCategoryModel;

class ProductCategoryController extends BaseController
{
    protected $ProductKategoriModel;
    
    public function __construct()
    {
        $this->ProductKategoriModel = new ProductCategoryModel();
    }
    
    public function index()
    {
        if ($this->request->getMethod() === 'post') {
            
            $nama = $this->request->getPost('nama');
            $data = ['nama' => $nama];
            
            if ($this->ProductKategoriModel->save($data)) {
                return redirect()->to(base_url('kategori'))->with('success', 'Data berhasil ditambahkan');
            } else {
                return redirect()->to(base_url('kategori'))->with('failed', 'Gagal menambahkan data');
            }
        }
        
        $data = [
            'title' => 'Kategori Produk',
            'kategori' => $this->ProductKategoriModel->findAll()
        ];
        
        return view('v_produkcategory', $data);
    }
    
    public function edit($id)
    {
        $nama = $this->request->getPost('nama');
        
        $data = [
            'id' => $id,
            'nama' => $nama
        ];
        
        if ($this->ProductKategoriModel->save($data)) {
            return redirect()->to(base_url('kategori'))->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->to(base_url('kategori'))->with('failed', 'Gagal mengubah data');
        }
    }
    
    public function delete($id)
    {
        if ($this->ProductKategoriModel->delete($id)) {
            return redirect()->to(base_url('kategori'))->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to(base_url('kategori'))->with('failed', 'Gagal menghapus data');
        }
    } 
}
?>
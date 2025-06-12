<?php

namespace App\Livewire;

use App\Models\TblBarang;
use Livewire\Component;
use Livewire\WithFileUploads;

class Barang extends Component
{
    use WithFileUploads;
    public $nama_product, $image, $description, $discount, $harga_diskon, $harga;
    protected $paginationTheme = 'bootstrap';
    public $updatedata = false;
    public $barang_id;
    public $selectedKategoriId;
    public $cari; 
public $sortcolom ='nama_product'; 
    public $sortdirection = 'asc';
    
    public function clear()
    {
        $this->nama_product = '';
        $this->description = '';
        $this->image = '';
        $this->discount = '';
        $this->harga_diskon = '';
        $this->harga = '';
       

    }


    public function simpan()
    {
        $rules = [
            'nama_product' => 'required',
            'image' => 'nullable|image|max:2048', // 1MB Max
            
        ];
        $messages = [
            'nama_product.required' => 'Nama Barang tidak boleh kosong',
            'image.image' => 'File harus berupa gambar',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            
        ];
        $validated = $this->validate($rules, $messages);
        

        // Simpan data ke database
        $data = [
            'nama_product' => $this->nama_product,
            'description' => $this->description,
            'discount' => $this->discount,
            'harga_diskon' => $this->harga_diskon,
            'harga' => $this->harga,
            
        ];

        // Cek apakah ada gambar yang diupload
        if ($this->image != null) {
            $data['image'] = $this->image->store('barang', 'public');
        } else {
            $data['image'] = null; // atau bisa dihapus jika tidak ingin menyimpan key 'gambar' sama sekali
        }

        // Simpan ke database
        TblBarang::create($data);
        session()->flash('message', 'Data Barang berhasil disimpan.');
        $this->clear();
        // Initialization code can go here
    }
    public function render()
    {
        $dtbarang = TblBarang::orderBy($this->sortcolom, $this->sortdirection)->paginate(10);
        return view('livewire.barang',['dtbarang' => $dtbarang]);
    }
}
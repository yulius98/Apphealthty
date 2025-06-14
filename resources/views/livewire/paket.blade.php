@php use Illuminate\Support\Facades\Storage; @endphp

<div class="container">
    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>    
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
    @endif
    <!-- START FORM -->
    <div class="row my-3">
        <!-- Kolom Kiri: Form Paket -->
        <div class="col-md-6">
            <div class="rounded shadow-sm shadow-black ">
                <form>
                    <div class="row">
                        <div class="mb-3 row">
                            <label for="nama_kategori" class="col-sm-4 col-form-label">Nama Paket</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_paket" wire:model="nama_paket">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama_kategori" class="col-sm-4 col-form-label">Harga Paket</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="harga_paket" wire:model="harga_paket">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="nama_kategori" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="deskripsi" wire:model="deskripsi">
                            </div>
                        </div>

                        <div>
                            <div class="form-group row">
                                <label for="panduan_paket" class="col-sm-3 col-form-label">Panduan Paket</label>
                                <div class="col-sm-9">
                                    <input 
                                        type="file" 
                                        class="form-control @error('panduan_paket') is-invalid @enderror" 
                                        id="panduan_paket" 
                                        wire:model="panduan_paket" 
                                        accept=".pdf"
                                        onchange="document.getElementById('label-paket').innerText = this.files[0]?.name || 'Pilih Panduan Paket';"
                                    >
                                    <small id="label-paket" class="form-text text-muted">Pilih Panduan Paket</small>
                                    @error('panduan_paket') 
                                        <span class="invalid-feedback d-block">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-group row">
                                <label for="video_panduan" class="col-sm-3 col-form-label">Video Panduan</label>
                                <div class="col-sm-9">
                                    <input 
                                        type="file" 
                                        class="form-control @error('video_panduan') is-invalid @enderror" 
                                        id="video_panduan" 
                                        wire:model="video_panduan" 
                                        accept=".mp4"
                                        onchange="document.getElementById('label-video').innerText = this.files[0]?.name || 'Pilih Panduan video';"
                                    >
                                    <small id="label-video" class="form-text text-muted">Pilih Panduan Paket</small>
                                    @error('video_panduan') 
                                        <span class="invalid-feedback d-block">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-12 text-end">
                            @if ($updatedata == false)
                                <button type="button" class="btn btn-primary" wire:click="simpan()">SIMPAN</button>
                            @else
                                <button type="button" class="btn btn-primary" wire:click="update()">UPDATE</button>    
                            @endif
                            <button type="button" class="btn btn-secondary" wire:click="clear()">Clear</button>    
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Data Tabel -->
        <div class="col-md-6">
            <div class="p-3 bg-body rounded shadow-sm">
                <h4 class="font-medium">Data Paket</h4>
                {{ $dtpaket->links() }}
                <table class="table table-striped table-sortable">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-6 sort" @if ($sortcolom == 'nama_paket') {{ $sortdirection }} @endif wire:click="sort('nama_paket')">Nama Paket</th>
                            <th class="col-md-3">Harga</th>
                            <th class="col-md-3">Keterangan</th>
                            <th class="col-md-3">Panduan Paket</th>
                            <th class="col-md-3">Video Paket</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtpaket as $key => $value)
                            <tr>
                                <td>{{ $dtpaket->firstitem() + $key }}</td>
                                <td>{{ $value->nama_paket }}</td>
                                <td>{{ $value->harga }}</td>
                                <td>{{ $value->deskripsi }}</td>
                                <td>{{ $value->panduan_paket }}</td>
                                <td>{{ $value->video_panduan }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
                                        <a wire:click="konfimasihapus({{ $value->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Del</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dtpaket->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" wire:click="hapus()" data-bs-dismiss="modal">YA</button>
                </div>
            </div>
        </div>
    </div>

</div>

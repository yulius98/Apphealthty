    <x-leandingpage>
    <x-nav-bar-home/>
    <div class="form-wrapper">
      <form id="FormCekGratis" class="container py-4" action="/cekgratis" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="mb-3 d-flex align-items-center">
            <label for="nama" class="form-label fw-light text-black me-2 mb-0" style="min-width: 80px;">No Reg</label>
            <input type="text" id="registrationNumber" name="registrationNumber" readonly class="form-control">

            <script>
              function generateRegistrationNumber(date = new Date()) {
                const months = [
                  "JAN", "FEB", "MAR", "APR", "MEI", "JUN",
                  "JUL", "AGU", "SEP", "OKT", "NOV", "DES"
                ];
                const monthCode = months[date.getMonth()];

                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let randomPart = '';
                for (let i = 0; i < 4; i++) {
                  randomPart += chars.charAt(Math.floor(Math.random() * chars.length));
                }

                return `${monthCode}-${randomPart}`;
              }

              // Masukkan ke dalam input
              const regNumber = generateRegistrationNumber();
              document.getElementById("registrationNumber").value = regNumber;
            </script>
          </div>

          <div class="mb-3 d-flex align-items-center">
            <label for="nama" class="form-label fw-light text-black me-2 mb-0" style="min-width: 80px;">Nama</label>
            <input type="text" id="nama" name="nama" required class="form-control">
          </div>


          <div class="mb-3 d-flex align-items-center">
            <label for="no_hp" class="form-label fw-light text-black me-2 mb-0" style="min-width: 80px;">No HP</label>
            <input type="number" id="no_hp" name="no_hp" required class="form-control">
          </div>

          <div class="mb-3 d-flex align-items-center">
            <label for="berat_badan" class="form-label fw-light text-black me-2 mb-0" style="min-width: 80px;">Berat Badan</label>
            <input type="number" id="berat_badan" name="berat_badan" required class="form-control">
            <label for="satuan_berat_badan" class="form-label fw-light text-black me-2 mb-0 ">Kg</label>
          </div>

          <div class="mb-3 d-flex align-items-center">
            <label for="tinggi_badan" class="form-label fw-light text-black me-2 mb-0" style="min-width: 80px;">Tinggi Badan</label>
            <input type="number" id="tinggi_badan" name="tinggi_badan" required class="form-control">
            <label for="satuan_berat_badan" class="form-label fw-light text-black me-2 mb-0 ">cm</label>
          </div>

          <div class="mb-3 d-flex align-items-center">
            <label class="form-label fw-light text-black d-block me-2 mb-0" style="min-width: 80px;">Aktifitas</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="aktifitas_jarang" name="aktifitas" value="jarang" class="form-check-input" required>
                <label for="aktifitas_jarang" class="form-check-label">Jarang</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="aktifitas_sedang" name="aktifitas" value="sedang" class="form-check-input" required>
                <label for="aktifitas_sedang" class="form-check-label">Sedang</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="aktifitas_aktif" name="aktifitas" value="aktif" class="form-check-input" required>
                <label for="aktifitas_aktif" class="form-check-label">Aktif</label>
            </div>
          </div>

          <div class="mb-3 d-flex align-items-center">
            <label class="form-label fw-light text-black d-block me-2 mb-0" style="min-width: 80px;">Alergi</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="alergi_yes" name="alergi" value="ya" class="form-check-input" required>
                <label for="alergi_yes" class="form-check-label">Ya</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="alergi_no" name="alergi" value="tidak" class="form-check-input" required>
                <label for="alergi_no" class="form-check-label">Tidak</label>
            </div>
          </div>

          <div class="d-flex justify-content-end gap-3 mt-4">
              <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">Cancel</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
    </form>
  </div>
<footer class="text-center py-5">
  <div class="container px-5">
    <div class="text-white small">
    <div class="mb-2">Nama Perusahaan</div>  
    <div class="mb-2">Alamat</div>
    <div class="mb-2">No. Telp</div>
    <div class="mb-2">Social Media</div>
    </div>
    </div>
</footer>
  
</x-leandingpage>

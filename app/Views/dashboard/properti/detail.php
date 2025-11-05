<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <form action="<?= base_url('dashboard/properti/update/' . $data['id']) ?>" method="post"
      enctype="multipart/form-data">
      <?= csrf_field() ?>
      <div class="row align-items-end">
        <div class="col-12 mb-3">
          <h3>Informasi Properti</h3>
        </div>
        <div class="col-6 col-md-8">
          <div class="form-group">
            <label for="title">Judul Iklan Properti <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $data['title']) ?>"
              required>
            <div class="invalid-feedback">
              <?= $validation?->getError('title') ?>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="type">Tipe Properti</label>
            <input type="hidden" name="tipe" value="<?= reset($kategoris)['name'] ?? '' ?>">
            <select class="form-select multi-select" name="type" id="type">
              <?php foreach ($kategoris as $k): ?>
                <option value="<?= $k['id'] ?>" <?= (old('type', $data['type']) == $k['id']) ? 'selected' : '' ?>>
                  <?= $k['name'] ?>
                </option>
              <?php endforeach ?>
            </select>
            <div class="invalid-feedback">
              <?= $validation?->getError('type') ?>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="price">Harga <span class="text-danger">*</span></label>
            <input type="text" id="price" name="price"
              class="form-control currency <?= ($validation?->hasError('price')) ? 'is-invalid' : '' ?>"
              value="<?= old('price', number_format($data['price'], 0, ',', '.')) ?>" placeholder="2.000.000.000"
              required>
            <div class="invalid-feedback">
              <?= $validation?->getError('price') ?>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-select steps-select" name="status" id="status">
              <option value="dijual" <?= (old('status', $data['status']) == 'dijual') ? 'selected' : '' ?>>Dijual</option>
              <option value="disewakan" <?= (old('status', $data['status']) == 'disewakan') ? 'selected' : '' ?>>Disewakan
              </option>
              <option value="terjual" <?= (old('status', $data['status']) == 'terjual') ? 'selected' : '' ?>>Terjual
              </option>
              <option value="tersewa" <?= (old('status', $data['status']) == 'tersewa') ? 'selected' : '' ?>>Tersewa
              </option>
            </select>
            <div class="invalid-feedback">
              <?= $validation?->getError('status') ?>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="certificate">Sertifikat</label>
            <select class="form-select multi-select" name="certificate" id="certificate">
              <option value="">-- Pilih Sertifikat --</option>
              <option value="SHM" <?= (old('certificate', $data['certificate']) == 'SHM') ? 'selected' : '' ?>>SHM
                (Sertifikat Hak Milik)
              </option>
              <option value="HGB" <?= (old('certificate', $data['certificate']) == 'HGB') ? 'selected' : '' ?>>HGB (Hak
                Guna
                Bangunan)</option>
              <option value="HGU" <?= (old('certificate', $data['certificate']) == 'HGU') ? 'selected' : '' ?>>HGU (Hak
                Guna
                Usaha)</option>
              <option value="AJB" <?= (old('certificate', $data['certificate']) == 'AJB') ? 'selected' : '' ?>>AJB (Akta
                Jual Beli)</option>
              <option value="Surat Keterangan" <?= (old('certificate', $data['certificate']) == 'Surat Keterangan') ? 'selected' : '' ?>>Surat
                Keterangan</option>
              <option value="SHGB" <?= (old('certificate', $data['certificate']) == 'SHGB') ? 'selected' : '' ?>>SHGB
                (Sertifikat Hak Guna
                Bangunan)</option>
              <option value="SHSRS" <?= (old('certificate', $data['certificate']) == 'SHSRS') ? 'selected' : '' ?>>SHSRS
                (Sertifikat Hak Satuan
                Rumah Susun)</option>
              <option value="HP" <?= (old('certificate', $data['certificate']) == 'HP') ? 'selected' : '' ?>>HP (Hak Pakai)
              </option>
              <option value="Girik" <?= (old('certificate', $data['certificate']) == 'Girik') ? 'selected' : '' ?>>Girik /
                Letter C</option>
              <option value="Lainnya" <?= (old('certificate', $data['certificate']) == 'Lainnya') ? 'selected' : '' ?>>
                Lainnya</option>
            </select>
            <div class="invalid-feedback">
              <?= $validation?->getError('certificate') ?>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="hidden" name="province" id="province" value="<?= $data['province'] ?>">
            <select class="form-select multi-select" name="provinsi" id="provinsi">
              <option value="">--Pilih Provinsi--</option>
              <?php foreach ($provinsi as $p): ?>
                <option value="<?= $p['kode'] ?>" <?= (old('provinsi', $data['province']) == $p['name']) ? 'selected' : '' ?>>
                  <?= $p['name'] ?>
                </option>
              <?php endforeach ?>
            </select>
            <div class="invalid-feedback">
              <?= $validation?->getError('provinsi') ?>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="city">Kabupaten/Kota</label>
            <select class="form-select multi-select" name="city" id="city">
              <option value="">--Pilih Kabupaten/Kota--</option>
            </select>
            <div class="invalid-feedback">
              <?= $validation?->getError('city') ?>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" id="address" name="address"
              class="form-control <?= ($validation?->hasError('address')) ? 'is-invalid' : '' ?>" required
              value="<?= old('address', $data['address']) ?>" placeholder="Jl. Jend. Sudirman No. 20, Jakarta Selatan">
            <div class="invalid-feedback">
              <?= $validation?->getError('address') ?>
            </div>
          </div>
        </div>
        <hr>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="bedrooms">Kamar Tidur</label>
            <input type="number" id="bedrooms" name="bedrooms" class="form-control"
              value="<?= old('bedrooms', $data['bedrooms']) ?>">
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="bathrooms">Kamar Mandi</label>
            <input type="number" id="bathrooms" name="bathrooms" class="form-control"
              value="<?= old('bathrooms', $data['bathrooms']) ?>">
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="carport">Carport/Garasi</label>
            <input type="number" id="carport" name="carport" class="form-control"
              value="<?= old('carport', $data['carport']) ?>">
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="building_area">Luas Bangunan (m<sup>2</sup>)</label>
            <input type="number" id="building_area" name="building_area" class="form-control"
              value="<?= old('building_area', $data['building_area']) ?>">
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="land_area">Luas Tanah (m<sup>2</sup>)</label>
            <input type="number" id="land_area" name="land_area" class="form-control"
              value="<?= old('land_area', $data['land_area']) ?>">
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="floors">Jumlah Lantai</label>
            <input type="number" id="floors" name="floors" class="form-control"
              value="<?= old('floors', $data['floors']) ?>">
          </div>
        </div>
        <hr>
        <div class="col-12">
          <h6 class="m-0">Fasilitas</h6>
          <p class="text-muted">Pilih semua fasilitas yang berlaku.</p>
        </div>
        <?php $listFasilitas = explode(',', $data['facilities']); ?>
        <?php $fasilitasLain = array_diff($listFasilitas, array_column($fasilitas, 'name')); ?>
        <?php foreach ($fasilitas as $item): ?>
          <div class="col-6 col-md-4">
            <div class="form-group m-0">
              <div class="form-check mt-0">
                <label class="form-check-label" for="<?= $item['name'] ?>">
                  <input class="form-check-input" type="checkbox" name="fasilitas[]" id="<?= $item['name'] ?>"
                    value="<?= $item['name'] ?>" <?= in_array($item['name'], $listFasilitas) ? 'checked' : '' ?>>
                  <?= $item['name'] ?>
                </label>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <div class="col-6 col-md-4">
          <div class="form-group m-0">
            <label for="lainnya">Fasilitas Lainnya</label>
            <input type="text" class="form-control" name="fasilitas[]" id="lainnya"
              value="<?= implode(', ', $fasilitasLain) ?>">
            <small class="text-muted">Pisahkan fasilitas lainnya dengan koma (,)</small>
          </div>
        </div>
        <hr>
        <?php $listAgen = explode(';', $data['agen']) ?>
        <div class="col-12 col-md-6">
          <div class="form-group">
            <label for="agen" class="form-label">Agen</label>
            <select class="form-select multiple-select" id="agen" name="agen[]" multiple="multiple"
              <?= session('role') == 'agen' ? 'disabled' : '' ?>>
              <?php foreach ($agens as $row): ?>
                <option value="<?= $row['id'] ?>" <?= in_array($row['name'], $listAgen) ? 'selected="selected"' : '' ?>>
                  <?= $row['name'] ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <?php if ($data['owner'] != null): ?>
          <div class="col-6">
            <div class="form-group">
              <?php $owner = explode(',', $data['owner']) ?>
              <span class="fw-semibold">Data Pemilik Properti yang melakukan penawaran: </span>
              <?php foreach ($owner as $key => $row): ?>
                <?php if ($key == 1): ?>
                  <br>
                <?php endif ?>
                <span><?= $row ?></span>
              <?php endforeach ?>
            </div>
          </div>
        <?php endif ?>
        <div class="col-12">
          <div class="form-group">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="6"
              placeholder="Tulis deskripsi properti..."><?= old('description', $data['description']) ?></textarea>
          </div>
        </div>
        <hr>
        <div class="col-12 mb-3">
          <h6 class="m-0">Foto Properti</h6>
          <p class="text-muted">Unggah foto-foto properti Anda. Foto pertama akan ditampilkan sebagai banner iklan.
            Kami sarankan unggah foto yang jelas dan menarik untuk menarik minat calon pembeli.</p>
        </div>
        <div class="col-12">
          <div class="row" id="upload-container">
            <?php if (!empty($data['images'])): ?>
              <?php foreach ($data['images'] as $image): ?>
                <div class="col-3">
                  <div class="form-group">
                    <input type="file" class="dropify" name="images[]"
                      data-default-file="<?= base_url($image['image_url']) ?>" data-image-id="<?= $image['id'] ?>"
                      data-allowed-file-extensions="jpg jpeg png" data-max-file-size="3M">
                  </div>
                </div>
              <?php endforeach ?>
            <?php endif ?>
            <div class="col-3">
              <div class="form-group">
                <input type="file" class="dropify" name="images[]" data-allowed-file-extensions="jpg jpeg png"
                  data-max-file-size="3M">
              </div>
            </div>
          </div>
        </div>
        <?php if (session('role') != 'agen'): ?>
          <hr>
          <div class="col-3">
            <div class="form-group m-0">
              <label for="publish">Publikasi</label>
              <select class="form-select" name="publish" id="publish">
                <option value="1" <?= $data['publish'] == 1 ? 'selected' : '' ?>>Publik</option>
                <option value="0" <?= $data['publish'] == 0 ? 'selected' : '' ?>>Draft</option>
              </select>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group m-0">
              <label for="favorite">Prioritas</label>
              <select class="form-select" name="favorite" id="favorite">
                <option value="1" <?= $data['favorite'] == 1 ? 'selected' : '' ?>>Favorite</option>
                <option value="0" <?= $data['favorite'] == 0 ? 'selected' : '' ?>>Reguler</option>
              </select>
            </div>
          </div>
          <div class="col-6 text-end">
            <?php if ($data['transaksi'] != null): ?>
              <p class="align-self-end">Properti ini tidak dapat dihapus karena telah terjadi transaksi.</p>
            <?php endif ?>
            <button type="button" class="btn btn-danger btn-icon-text btn-delete
            <?= $data['transaksi'] != null ? 'disabled' : '' ?>" data-id="<?= $data['id'] ?>">
              <i class="fa-solid fa-trash btn-icon-prepend"></i> Hapus
            </button>
          </div>
        <?php endif ?>

        <div class="col-12 text-end mt-5">
          <a href="<?= base_url('dashboard/properti') ?>" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary btn-icon-text">
            <i class="fa-solid fa-floppy-disk btn-icon-prepend"></i> Simpan
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  let kabupatens = <?= json_encode($kota) ?>;
  let province = $('#provinsi').find('option:selected').val();
  optionKota(province);

  $(document).on('change', '#provinsi', function () {
    const id = $(this).find('option:selected').val();
    const province = $(this).find('option:selected').text().trim();
    $('#province').val(province);
    optionKota(id);
  });

  $(document).on('click', '.btn-delete', function () {
    let id = $(this).data('id');
    Swal.fire({
      title: 'Konfirmasi',
      text: 'Apakah Anda yakin ingin menghapus data ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `<?= base_url('dashboard/properti/delete/') ?>${id}`,
          type: 'POST',
          data: {},
          success: function (res) {
            Swal.fire({
              title: res.title,
              icon: res.icon,
              text: res.text,
            }).then(() => {
              window.location.href = '<?= base_url('dashboard/properti') ?>';
            })
          },
          error: function (err) {
            console.error(err);
          }
        });
      }
    });
  });

  function optionKota(id) {
    let selectedKota = '<?= $data['city'] ?>';
    let filteredKabupatens = kabupatens.filter(kabupaten => kabupaten.parent === id);
    let opt = `<option value="">--Pilih Kabupaten/Kota--</option>`;
    filteredKabupatens.forEach(kabupaten => {
      opt += `<option value="${kabupaten.name}" ${selectedKota == kabupaten.name ? 'selected' : ''}>${kabupaten.name}</option>`;
    });
    $('#city').html(opt);
  }

  // Fungsi untuk menambahkan input file baru secara dinamis
  $(document).on('change', '#upload-container .dropify', function () {
    let parent = $('#upload-container');
    let currentInput = $(this);
    let lastInput = parent.find('.dropify').last();

    // Hanya tambahkan input baru jika input yang diubah adalah input terakhir
    if (currentInput.is(lastInput) && currentInput.val() !== '') {
      // Tunggu sebentar untuk memastikan dropify sudah selesai memproses
      setTimeout(function () {
        let lastInputCheck = parent.find('.dropify').last();

        // Cek apakah input terakhir memiliki file (baik dari input baru maupun default file)
        let hasFile = false;
        if (lastInputCheck.val() !== '' || lastInputCheck.data('default-file') ||
          lastInputCheck.closest('.dropify-wrapper').hasClass('has-preview')) {
          hasFile = true;
        }

        // Jika input terakhir memiliki file, tambahkan input baru
        if (hasFile) {
          parent.append(`
            <div class="col-3">
              <div class="form-group">
                <input type="file" class="dropify" name="images[]" data-allowed-file-extensions="jpg jpeg png"
                  data-max-file-size="3M">
              </div>
            </div>
          `);
          // Inisialisasi dropify pada input baru
          parent.find('.dropify').last().dropify();
        }
      }, 100);
    }
  });

  // Event handler untuk menghapus gambar ketika tombol remove diklik
  $(document).on('dropify.afterClear', '#upload-container .dropify', function (event, element) {
    let input = $(this);
    let imageId = input.data('image-id');
    let defaultFile = input.data('default-file');

    // Hanya proses jika gambar berasal dari database (memiliki image-id)
    if (imageId) {
      // Simpan referensi untuk restore jika dibatalkan
      let container = input.closest('.col-3');

      // Konfirmasi sebelum menghapus
      Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menghapus gambar ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Panggil method deleteImage via AJAX
          $.ajax({
            url: `<?= base_url('dashboard/properti/delete-image/') ?>${imageId}`,
            type: 'POST',
            data: {},
            success: function (res) {
              Swal.fire({
                title: res.title,
                icon: res.icon,
                text: res.text,
              });

              // Hapus elemen container dari DOM
              container.remove();
            },
            error: function (xhr, status, error) {
              Swal.fire({
                title: 'Gagal',
                icon: 'error',
                text: 'Terjadi kesalahan saat menghapus gambar'
              });

              // Restore preview jika terjadi error
              if (defaultFile) {
                input.dropify('destroy');
                input.attr('data-default-file', defaultFile);
                input.attr('data-image-id', imageId);
                input.dropify();
              }
            }
          });
        } else {
          // Jika user membatalkan, restore preview dengan gambar asli
          if (defaultFile) {
            input.dropify('destroy');
            input.attr('data-default-file', defaultFile);
            input.attr('data-image-id', imageId);
            input.dropify();
          }
        }
      });
    }
    // Jika tidak ada image-id (file baru yang belum disimpan), biarkan clear berjalan normal
  });
</script>
<?= $this->endSection() ?>
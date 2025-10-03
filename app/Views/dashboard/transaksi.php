<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
  <div class="col text-end">
    <button class="btn btn-primary btn-modal" data-bs-toggle="modal" data-bs-target="#myModal">
      <i class="fas fa-plus"></i> Tambah Data
    </button>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-2">
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-select" id="status" name="status">
            <option value="">Semua</option>
            <option value="pending">Pending</option>
            <option value="Valid">Tervalidasi</option>
          </select>
        </div>
      </div>
      <?php if (session('role') != 'agen'): ?>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="agen">Agen</label>
            <select class="form-select multi-select" id="agen" name="agen">
              <option value="">Semua</option>
              <?php foreach ($agens as $agen): ?>
                <option value="<?= $agen['id'] ?>"><?= $agen['name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      <?php endif ?>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select class="form-select multi-select" id="kategori" name="kategori">
            <option value="">Semua</option>
            <?php foreach ($kategori as $row): ?>
              <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <button type="submit" class="btn btn-primary mt-4" id="btn-cari">Cari</button>
      </div>
    </div>
    <div class="table-responsive" id="fetch-data"></div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="validasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="validasiModalLabel">Validasi Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="validateForm">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tbody id="tbody-validasi"></tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Validasi</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="property_id">Properti</label>
                <select class="form-select modal-select" name="property_id" id="property_id">
                  <option value="">Pilih Properti</option>
                  <?php foreach ($data as $property): ?>
                    <option value="<?= $property['id'] ?>"><?= $property['title'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="table-responsive" id="property-details"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  let data = <?= json_encode($data) ?>;
  console.log(data);

  let transaksi = {};

  let status = $('#status').find('option:selected').val();
  let agen = $('#agen').find('option:selected').val();
  let kategori = $('#kategori').find('option:selected').val();
  getData(kategori, status, agen);

  $(document).on('click', '#btn-cari', function () {
    status = $('#status').find('option:selected').val();
    agen = $('#agen').find('option:selected').val();
    kategori = $('#kategori').find('option:selected').val();
    getData(kategori, status, agen);
  });

  let agens = <?= json_encode($agens) ?>;

  handleModalClick({
    selector: '.btn-modal',
    modalTitle: 'Transaksi',
    formActionUrl: id => '<?= base_url('dashboard/transaksi/') ?>' + (id ? 'update/' : 'store'),
    findData: id => transaksi.find(item => item.transaksi_id == id),
    defaultValues: {
      property_id: '',
    },
    fieldMap: {
      inputs: [{
        name: 'buyer',
      }, {
        name: 'wa_buyer',
      }, {
        name: 'price',
        valueKey: 'jual',
      }, {
        name: 'tanggal_penjualan',
      }, {
        name: 'tanggal_serah_terima',
      },],
      selects: [{
        name: 'property_id',
        valueKey: 'id',
      },],
    }
  });

  $(document).on('change', '#property_id', function (e) {
    e.preventDefault();
    let id = $(this).find('option:selected').val();
    let res = data.find(e => e.id == id);

    if (res != undefined) {
      let html = `
      <table class="table table-bordered">
        <tr>
          <th class="fit-column">Iklan Properti</th>
          <td>${res.title}</td>
        </tr>
        <tr>
          <th>Kategori</th>
          <td>${res.kategori}</td>
        </tr>
        <tr>
          <th>Harga</th>
          <td>${shortNumber(res.price)}</td>
        </tr>
        <tr>
          <th>Provinsi</th>
          <td>${res.province}</td>
        </tr>
        <tr>
          <th>Kota</th>
          <td>${res.city}</td>
        </tr>
        <tr>
          <th>Status</th>
          <td class="text-capitalize">${res.status}</td>
        </tr>
        <tr>
          <th>Agen</th>
          <td>
            <select class="form-select modal-select" id="agent_id" name="agent_id">`;

      if (role == 'agen') {
        html += `<option value="<?= session('id') ?>" selected="selected"><?= session('name') ?></option>`;
      } else {
        $.each(agens, function (i, agen) {
          html += `<option value="${agen.id}">${agen.name}</option>`;
        })
      }

      html += `</select>
          </td>
        </tr>
        <tr>
          <th>Pembeli</th>
          <td><input type="text" name="buyer" class="form-control" required></td>
        </tr>
        <tr>
          <th>Whatsapp Pembeli</th>
          <td><input type="text" name="wa_buyer" class="form-control" required></td>
        </tr>
        <tr>
          <th>UTJ</th>
          <td><input type="text" name="price" class="form-control currency" required></td>
        </tr>
        <input type="hidden" name="status" value="${res.status}">
        <tr>
          <th>Tanggal Pembelian</th>
          <td><input type="date" name="tanggal_penjualan" class="form-control" required></td>
        </tr>
        <tr>
          <th>Tanggal Serah Terima</th>
          <td><input type="date" name="tanggal_serah_terima" class="form-control" required></td>
        </tr>
      </table>
      `;

      $('#property-details').html(html);
      fillForm(id);
    }
  });

  function fillForm(id) {
    let i = transaksi.find(item => item.id == id);
    console.log(i);

    if (i != undefined) {
      $('select[name="property_id"]').parent().remove();
      $('input[name="buyer"]').before('<input type="hidden" name="property_id" value="' + i.id + '">');
      $('input[name="buyer"]').before('<input type="hidden" name="status" value="pending">');
      $('input[name="buyer"]').val(i.buyer);
      $('input[name="wa_buyer"]').val(i.wa_buyer);
      $('input[name="price"]').val(formatAngka(i.jual));
      $('input[name="tanggal_penjualan"]').val(i.tanggal_penjualan);
      $('input[name="tanggal_serah_terima"]').val(i.tanggal_serah_terima);
    }
  }

  $(document).on('click', '.btn-validasi', function () {
    let id = $(this).data('id');
    let res = transaksi.find(e => e.transaksi_id == id);
    // console.log(res);

    $('#validateForm').attr('action', `<?= base_url('dashboard/transaksi/validasi/') ?>${id}`);
    let isiTable = {
      'Judul Iklan': res.title,
      'Tipe Properti': res.kategori,
      'Harga Asli': formatAngka(res.price),
      'Harga Terjual': formatAngka(res.jual),
      'Agen': res.agen,
      'Pembeli': res.buyer,
      'Whatsapp Pembeli': res.wa_buyer,
      'Tanggal Pembelian': res.tanggal_penjualan,
      'Tanggal Serah Terima Kunci': res.tanggal_serah_terima,
    };
    let html = '';
    $.each(isiTable, function (key, value) {
      html += `
        <tr>
          <td>${key}</td>
          <td>:</td>
          <td>${value}</td>
        </tr>
      `
    })
    html += `
      <input type="hidden" name="property_id" value="${res.id}"><tr>
          <td>Catatan</td>
          <td>:</td>
          <td>
            <textarea class="form-control" name="note" rows="3" placeholder="Catatan untuk transaksi ini..."></textarea>
          </td>
        </tr>
      `;
    $('#tbody-validasi').html(html);
  })

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
          url: `<?= base_url('dashboard/transaksi/delete/') ?>${id}`,
          type: 'POST',
          data: {},
          success: function (res) {
            Swal.fire({
              title: res.title,
              icon: res.icon,
              text: res.text,
            }).then(() => {
              location.reload();
            })
          },
          error: function (err) {
            console.error(err);
          }
        });
      }
    });
  });

  function getData(kategori, status, agen) {
    $.ajax({
      url: '<?= base_url('dashboard/transaksi/get_ajax') ?>',
      type: 'POST',
      data: {
        kategori: kategori,
        status: status,
        agen: agen,
      },
      success: function (res) {
        // console.log(res);
        transaksi = res;
        generateTable(res);
      },
      error: function (err) {
        console.error(err);
      }
    });
  }

  let role = '<?= session('role') ?>';
  function generateTable(res) {
    let html = `
    <table class="table table-hover table-striped" id="basic-table">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Pembeli</th>
            <th>Whatsapp Pembeli</th>
            <th>Agen</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>`;

    let no = 1;
    $.each(res, function (key, row) {
      html += `<tr>
      <td class="text-center fit-column">${no++}</td>
      <td>${row.title}</td>
      <td>${row.kategori}</td>
      <td>${shortNumber(row.price)}</td>
      <td>${row.buyer}</td>
      <td>${row.wa_buyer}</td>
      <td>${row.agen}</td>
      <td class="text-capitalize">
        <span class="badge badge-${row.transaksi == 'Valid' ? 'success' : 'danger'}">
          ${row.transaksi}</span>
      </td>
      <td class="d-flex justify-content-center gap-1">`;

      if (role == 'agen') {
        html += `<button type="button" class="btn btn-light btn-sm btn-modal" data-bs-toggle="modal" data-bs-target="#myModal"
            data-id="${row.transaksi_id}"><i class="fas fa-edit"></i>
          </button>`;
      } else {
        if (row.transaksi != 'Valid') {
          html += `<button type="button" class="btn btn-info btn-sm btn-validasi" data-bs-toggle="modal" data-bs-target="#validasiModal"
            data-id="${row.transaksi_id}"><i class="fas fa-check"></i>
          </button>`;
        }
        html += `<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="${row.transaksi_id}"><i class="fas fa-trash"></i>
        </button>`;
      }

      html += `</td></tr>`;
    });

    html += `</tbody></table>`;

    $('#fetch-data').html(html);
    tableInit('#basic-table');
  }
</script>
<?= $this->endSection() ?>
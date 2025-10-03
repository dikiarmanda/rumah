<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
  <?php if (session('role') != 'agen'): ?>
    <div class="col text-end">
      <a href="<?= base_url('dashboard/properti/create') ?>" class="btn btn-primary" target="_blank">
        <i class="fas fa-plus"></i> Tambah Data
      </a>
    </div>
  <?php endif ?>
</div>

<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-2">
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-select" id="status" name="status">
            <option value="">Semua</option>
            <option value="dijual">Dijual</option>
            <option value="disewakan">Disewakan</option>
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
    <?php if (session('role') != 'agen' && $draft > 0): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?= $draft ?></strong> properti yang belum diverifikasi, silakan segera diverifikasi.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
    <div class="table-responsive" id="fetch-data"></div>
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
  let data = {};

  let status = $('#status').find('option:selected').val();
  let agen = $('#agen').find('option:selected').val();
  let kategori = $('#kategori').find('option:selected').val();
  getData(kategori, status, agen);

  $(document).on('click', '#btn-cari', function () {
    status = $('#status').find('option:selected').val();
    agen = $('#agen').find('option:selected').val();
    kategori = $('#kategori').find('option:selected').val();
    getData(kategori, status, agen);
  })

  $(document).on('click', '.favorite', function () {
    let $this = $(this).find('i');
    let id = $(this).data('id');
    let value = $this.hasClass('fa-regular') ? 1 : 0;
    $.ajax({
      url: `<?= base_url('dashboard/properti/favorite/') ?>${id}`,
      type: 'POST',
      data: {
        value: value,
      },
      success: function (res) {
        if (value == 1) {
          $this.removeClass('fa-regular');
          $this.addClass('fa-solid');
        } else {
          $this.removeClass('fa-solid');
          $this.addClass('fa-regular');
        }
      },
      error: function (err) {
        console.error(err);
      }
    });
  })

  $(document).on('click', '.btn-disable', function () {
    let id = $(this).data('id');
    let value = $(this).data('value');
    if (value == 1) {
      Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menonaktifkan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, nonaktifkan!',
        cancelButtonText: 'Tidak, batalkan!'
      }).then((result) => {
        if (result.isConfirmed) {
          setPublish(id, 0);
        }
      });
    } else {
      setPublish(id, 1);
    }
  });

  function setPublish(id, value) {
    $.ajax({
      url: `<?= base_url('dashboard/properti/disabled/') ?>${id}`,
      type: 'POST',
      data: {
        value: value,
      },
      success: function (res) {
        location.reload();
      },
      error: function (err) {
        console.error(err);
      }
    });
  }

  function getData(kategori, status, agen) {
    $.ajax({
      url: '<?= base_url('dashboard/properti/get_ajax') ?>',
      type: 'POST',
      data: {
        kategori: kategori,
        status: status,
        agen: agen,
      },
      success: function (res) {
        // console.log(res);
        data = res;
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
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Status</th>
            <th>Publikasi</th>
            ${role != 'agen' ? '<th>Favorit</th>' : ''}
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>`;

    let no = 1;
    $.each(res, function (key, row) {
      html += `<tr>
      <td class="text-center">${no++}</td>
      <td>${row.title}</td>
      <td>${row.kategori}</td>
      <td>${shortNumber(row.price)}</td>
      <td>${row.province}</td>
      <td>${row.city}</td>
      <td class="text-capitalize">${row.status}</td>
      <td>
        <span class="badge badge-${row.publish == 1 ? 'success' : 'danger'}">
          ${row.publish == 1 ? 'Publikasi' : 'Draft'}</span>
      </td>`;
      if (role != 'agen') {
        html += `<td class="text-center fs-4 favorite" data-id="<?= $row['id'] ?>" style="cursor: pointer;">
          <i class="${row.favorite == 1 ? 'fa-solid' : 'fa-regular'} fa-star text-warning"></i>
        </td>
        <td class="d-flex text-center gap-1">
          <a href="<?= base_url('dashboard/properti/') ?>${row.id}" class="btn btn-light btn-sm">
            <i class="fas fa-edit"></i>
          </a>`;
        if (row.agen != '') {
          html += `<button type="button" class="btn btn-${row.publish == 0 ? 'success' : 'danger'} btn-sm btn-disable"
            data-id="${row.id}" data-value="${row.publish}" ><i class="fas fa-eye${row.publish == 0 ? '' : '-slash'}"></i>
            </button>`;
        }
      } else {
        html += `<td class="d-flex text-center gap-1">
          <button type="button" class="btn btn-info btn-sm btn-modal" data-bs-toggle="modal" data-bs-target="#myModal"
            data-id="${row.id}" ><i class="fas fa-dollar"></i>
          </button>`
      }
      html += `</td></tr>`;
    });

    html += `</tbody ></table >`;

    $('#fetch-data').html(html);
    tableInit('#basic-table');
  }

  let agens = <?= json_encode($agens) ?>;

  handleModalClick({
    selector: '.btn-modal',
    modalTitle: 'Transaksi',
    formActionUrl: id => '<?= base_url('dashboard/transaksi/') ?>' + (id ? 'update/' : 'store'),
    findData: id => data.find(item => item.id == id),
    defaultValues: {
      property_id: '',
    },
    fieldMap: {
      inputs: [{
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
    }
  });
</script>
<?= $this->endSection() ?>
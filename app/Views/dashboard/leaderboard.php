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
    <div class="row align-items-end">
      <div class="col-2">
        <div class="form-group">
          <label for="tahun">Tahun Top Sales Yang Akan Ditampilkan <span class="text-danger">*</span></label>
          <input type="number" class="form-control" id="tahun" name="tahun" value="<?= $tahunSelected ?>"
            placeholder="Pilih Tahun yang ditampilkan" required>
        </div>
      </div>
      <div class="col-2">
        <div class="form-group">
          <button type="button" class="btn btn-primary" id="btnSimpanTahun">Simpan</button>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-striped" id="basic-table">
        <thead>
          <tr>
            <th class="text-center fit-column">No</th>
            <th>Agen</th>
            <th>Periode</th>
            <th class="text-center">Peringkat</th>
            <th class="text-center fit-column">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($data) && !empty($data)): ?>
            <?php foreach ($data as $key => $row): ?>
              <tr>
                <td class="text-center"><?= $key + 1 ?></td>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="<?= base_url($row['photo_agen'] ?? 'public/uploads/users/default.png') ?>" alt="image"
                      class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" />
                    <div class="ms-3">
                      <p class="fw-bold mb-1"><?= $row['name'] ?></p>
                      <p class="text-muted mb-0"><?= $row['email'] ?></p>
                    </div>
                  </div>
                </td>
                <td><?= $row['tahun'] ?></td>
                <td class="text-center"><?= $row['peringkat'] ?></td>
                <td class="text-center">
                  <button class="btn btn-light btn-sm btn-modal" data-bs-toggle="modal" data-bs-target="#myModal"
                    data-id="<?= $row['id'] ?>">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id'] ?>">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-semibold" id="myModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="agent_id">Agen <span class="text-danger">*</span></label>
            <select class="form-select modal-select" id="agent_id" name="agent_id" required>
              <option value="">-- Pilih Agen --</option>
              <?php foreach ($agents as $agent): ?>
                <option value="<?= $agent['id'] ?>"><?= $agent['name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="tahun">Tahun <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="tahun" name="tahun" value="<?= date('Y') ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="peringkat">Peringkat <span class="text-danger">*</span></label>
                <select class="form-select" id="peringkat" name="peringkat" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group text-center">
            <p class="text-start">Foto Dokumentasi</p>
            <label for="photo" style="cursor: pointer;">
              <img src="https://dummyimage.com/1080x720/d9d9d9/ffffff" alt="photo" class="img-thumbnail mb-2"
                style="width: 100%; height: 150px; object-fit: cover;" id="photopreview">
            </label>
            <input type="file" class="d-none" id="photo" name="photo" accept="image/*">
            <div><small class="text-muted">Klik gambar untuk mengubah</small></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  tableInit('#basic-table');

  const data = <?= json_encode($data) ?>;

  $(document).on('click', '.btn-delete', function () {
    const id = $(this).data('id');
    Swal.fire({
      title: 'Hapus Data',
      text: 'Apakah Anda yakin ingin menghapus data ini ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('dashboard/leaderboard/delete/') ?>' + id,
          type: 'POST',
          data: {},
          success: function (res) {
            // console.log(res);
            Swal.fire({
              title: res.title,
              text: res.text,
              icon: res.icon,
            }).then((result) => {
              location.reload();
            })
          },
          error: function (xhr, status, error) {
            console.error(error);
          }
        });
      }
    });
  })

  $('#photo').on('change', function (e) {
    if (e.target.files && e.target.files[0]) {
      let reader = new FileReader();
      reader.onload = function (e) {
        $('#photopreview').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files[0]);
    }
  });

  $('#myModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')

    if (id) {
      let d = data.find(item => item.id == id);
      console.log(d.photo);
      if (d.photo) {
        $('#photopreview').attr('src', `<?= base_url('') ?>${d.photo}`);
      } else {
        $('#photopreview').attr('src', `https://dummyimage.com/1080x720/d9d9d9/ffffff`);
      }
    } else {
      $('#photopreview').attr('src', `https://dummyimage.com/1080x720/d9d9d9/ffffff`);
    }
  });

  $('#myModal').on('hidden.bs.modal', function (e) {
    $('#photopreview').attr('src', `https://dummyimage.com/1080x720/d9d9d9/ffffff`);
    $('#photo').val('');
  })

  $(document).on('click', '#btnSimpanTahun', function () {
    let tahun = $('#tahun').val();
    $.ajax({
      url: '<?= base_url('dashboard/leaderboard/tahun') ?>',
      type: 'POST',
      data: {
        tahun: tahun,
      },
      success: function (res) {
        Swal.fire({
          title: res.title,
          icon: res.icon,
          text: res.text,
        });
      },
      error: function (err) {
        Swal.fire({
          title: res.title,
          icon: res.icon,
          text: res.text,
        });
      }
    });
  })

  handleModalClick({
    selector: '.btn-modal',
    modalTitle: 'Leaderboard',
    formActionUrl: id => '<?= base_url('dashboard/leaderboard/') ?>' + (id ? 'update/' : 'store'),
    findData: id => data.find(item => item.id == id),
    defaultValues: {
      tahun: new Date().getFullYear()
    },
    fieldMap: {
      inputs: [
        { name: 'tahun' },
      ],
      selects: [
        { name: 'agent_id' },
        { name: 'peringkat' },
      ],
    }
  });
</script>
<?= $this->endSection() ?>
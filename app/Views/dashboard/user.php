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
    <div class="table-responsive">
      <table class="table table-hover table-striped" id="basic-table">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Whatsapp</th>
            <th>Role</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ?>
          <?php foreach ($data as $row): ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= ucfirst($row['role']) ?></td>
              <td>
                <span class="badge badge-<?= $row['status'] == 'aktif' ? 'success' : 'danger' ?>">
                  <?= ucfirst($row['status']) ?></span>
              </td>
              <td class="text-center">
                <?php if ($row['role'] != 'owner' || session('role') == 'owner'): ?>
                  <button class="btn btn-light btn-sm btn-modal" data-bs-toggle="modal" data-bs-target="#myModal"
                    data-id="<?= $row['id'] ?>">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="btn btn-danger btn-sm btn-disable" data-id="<?= $row['id'] ?>"
                    data-name="<?= $row['name'] ?>">
                    <i class="fas fa-eye-slash"></i>
                  </button>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-semibold" id="myModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="form-group text-center">
            <label for="photo" style="cursor: pointer;">
              <img src="<?= base_url('public/uploads/users/default.png') ?>" alt="profile"
                class="img-thumbnail rounded-circle mb-2" style="width: 150px; height: 150px; object-fit: cover;"
                id="photopreview">
            </label>
            <input type="file" class="d-none" id="photo" name="photo" accept="image/*">
            <div><small class="text-muted">Klik gambar untuk mengubah</small></div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                <?php if (isset(session('errors')['name'])): ?>
                  <small class="text-danger"><?= session('errors')['name'] ?></small>
                <?php endif ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                <?php if (isset(session('errors')['email'])): ?>
                  <small class="text-danger"><?= session('errors')['email'] ?></small>
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="whatsapp">Whatsapp <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="628xxxx">
                <small class="text-muted">Format: 628xxxxx</small>
                <?php if (isset(session('errors')['whatsapp'])): ?>
                  <small class="text-danger"><?= session('errors')['whatsapp'] ?></small>
                <?php endif ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                  <option value="agen">Agen</option>
                  <option value="admin">Admin</option>
                  <?php if (session('role') == 'owner'): ?>
                    <option value="owner">Owner</option>
                  <?php endif ?>
                </select>
                <?php if (isset(session('errors')['role'])): ?>
                  <small class="text-danger"><?= session('errors')['role'] ?></small>
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti password</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="hidden" name="province" id="province">
                <select class="form-select modal-select" name="provinsi" id="provinsi">
                  <option value="">--Pilih Provinsi--</option>
                  <?php foreach ($provinsi as $p): ?>
                    <option value="<?= $p['kode'] ?>" <?= (old('provinsi') == $p['kode']) ? 'selected' : '' ?>>
                      <?= $p['name'] ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">Kabupaten/Kota</label>
                <select class="form-select modal-select" name="city" id="city">
                  <option value="">--Pilih Kabupaten/Kota--</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                  <option value="aktif">Aktif</option>
                  <option value="nonaktif">Nonaktif</option>
                </select>
                <?php if (isset(session('errors')['status'])): ?>
                  <small class="text-danger"><?= session('errors')['status'] ?></small>
                <?php endif ?>
              </div>
            </div>
            <div class="col-md-6 align-self-center text-end">
              <button type="button" class="btn btn-danger btn-sm btn-icon-text" id="btn-reset-password">
                <i class="fa-solid fa-unlock btn-icon-prepend"></i> Reset Password</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  const title = '<?= $title ?>';
  let data = <?= json_encode($data) ?>;

  tableInit('#basic-table');

  let kabupatens = <?= json_encode($kota) ?>;
  $(document).on('change', '#provinsi', function () {
    const id = $(this).find('option:selected').val();
    const province = $(this).find('option:selected').text().trim();
    $('#province').val(province);

    let filteredKabupatens = kabupatens.filter(kabupaten => kabupaten.parent === id);
    let opt = `<option value="">--Pilih Kabupaten/Kota--</option>`;
    filteredKabupatens.forEach(kabupaten => {
      opt += `<option value="${kabupaten.name}">${kabupaten.name}</option>`;
    });
    $('#city').html(opt);
  });

  $(document).on('click', '.btn-disable', function () {
    const id = $(this).data('id');
    const name = $(this).data('name');
    Swal.fire({
      title: 'Non Aktifkan User',
      text: 'Apakah Anda yakin ingin menonaktifkan ' + name + ' ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, Nonaktifkan',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `<?= base_url('dashboard/user/disabled/') ?>${id}`,
          type: 'POST',
          data: {},
          success: function (res) {
            console.log(res);
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

  $(document).on('click', '#btn-reset-password', function () {
    const id = $('#userForm').attr('action').split('/').pop();
    const name = $('#name').val();
    Swal.fire({
      title: 'Reset Password',
      text: 'Apakah Anda yakin ingin mereset password ' + name + ' ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, Reset',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `<?= base_url('dashboard/user/reset_password/') ?>${id}`,
          type: 'POST',
          data: {
            id: id,
          },
          success: function (res) {
            console.log(res);
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
      $('#password').removeAttr('required');
      $('#password').closest('small.text-muted').text('Biarkan kosong jika tidak ingin mengganti password.');
      if (d.photo) {
        $('#photopreview').attr('src', `<?= base_url('') ?>${d.photo}`);
      } else {
        $('#photopreview').attr('src', `<?= base_url('public/uploads/users/default.png') ?>`);
      }
    } else {
      $('#password').attr('required', 'required');
      $('#password').siblings('small.text-muted').text('Minimal 8 karakter.');
      $('#photopreview').attr('src', `<?= base_url('public/uploads/users/default.png') ?>`);
    }
  });

  $('#myModal').on('hidden.bs.modal', function (e) {
    $('#photopreview').attr('src', `<?= base_url('public/uploads/users/default.png') ?>`);
    $('#photo').val('');
  })

  handleModalClick({
    selector: '.btn-modal',
    modalTitle: 'User',
    formActionUrl: id => '<?= base_url('dashboard/user/') ?>' + (id ? 'update/' : 'store'),
    findData: id => data.find(item => item.id == id),
    defaultValues: {
      role: 'agen',
      status: 'aktif',
    },
    fieldMap: {
      inputs: [{
        name: 'name',
      }, {
        name: 'email',
      }, {
        name: 'whatsapp',
        valueKey: 'phone',
      },],
      selects: [{
        name: 'role',
      }, {
        name: 'status',
      },],
    }
  });
</script>
<?= $this->endSection() ?>
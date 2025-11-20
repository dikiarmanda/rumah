<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <form action="<?= base_url('dashboard/kontak/update') ?>" method="post">
      <div class="row">
        <?php foreach ($data as $item): ?>
          <div class="col-md-6">
            <div class="form-group">
              <label for="<?= $item['type'] ?>">
                <?= ucfirst($item['type']) ?>
                <?php if ($item['type'] == 'maps'): ?>
                  (Masukkan embed link dari Google Maps [Bagikan > Sematkan peta])
                <?php endif ?>
              </label>
              <input type="text" class="form-control" id="<?= $item['type'] ?>" name="<?= $item['id'] ?>"
                value="<?= esc($item['value']) ?>">
            </div>
          </div>
        <?php endforeach ?>
        <div class="col-12 text-end">
          <button type="submit" class="btn btn-primary btn-icon-text">
            <i class="fa-solid fa-floppy-disk btn-icon-prepend"></i> Simpan
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
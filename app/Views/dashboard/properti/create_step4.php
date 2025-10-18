<div class="card-body">
  <div class="row mb-3">
    <div class="col">
      <h3 class="card-title fw-bold m-0">Deskripsi</h3>
      <p class="card-text text-muted">Tulis deskripsi properti.</p>
    </div>
    <div class="col text-end">
      <small class="text-muted">Langkah 4 dari 4</small>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="form-group">
        <label for="agen" class="form-label">Agen</label>
        <select class="form-select steps-selects" name="agen[]" id="agen" multiple="multiple">
          <?php if (session('role') == 'agen'): ?>
            <option value="<?= session('id') ?>" selected><?= session('name') ?></option>
          <?php else: ?>
            <option value="">--Pilih Agen--</option>
            <?php foreach ($agens as $row): ?>
              <option value="<?= $row['id'] ?>" selected><?= $row['name'] ?></option>
            <?php endforeach ?>
          <?php endif ?>
        </select>
      </div>
      <div class="form-group">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="6"
          placeholder="Tulis deskripsi properti..."></textarea>
      </div>
    </div>
  </div>
</div>
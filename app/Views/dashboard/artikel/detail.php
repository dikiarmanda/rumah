<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="title">Judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title"
              value="<?= old('title', $data['title'] ?? '') ?>" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="category">Kategori <span class="text-danger">*</span></label>
            <input type="text" class="form-control typeahead" id="category" name="category"
              value="<?= old('category', $data['category'] ?? '') ?>" required>
          </div>
        </div>
        <div class="col-12 mb-5">
          <input type="hidden" name="content" id="content">
          <label for="editor">Konten</label>
          <div id="editor"><?= old('content', $data['content'] ?? '') ?></div>
        </div>
        <div class="col-12 mt-5">
          <div class="form-group">
            <label for="thumbnail">Thumbnail <span class="text-danger">*</span></label>
            <input type="file" class="dropify" id="thumbnail" name="thumbnail" required
              data-allowed-file-extensions="jpg jpeg png" data-max-file-size="3M" <?= isset($data['thumbnail']) ? 'data-default-file="' . base_url($data['thumbnail']) . '"' : '' ?>>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="draft" <?= isset($data['status']) && $data['status'] == 'draft' ? 'selected' : '' ?>>Draft
              </option>
              <option value="published" <?= isset($data['status']) && $data['status'] == 'published' ? 'selected' : '' ?>>
                Publish</option>
              <option value="archived" <?= isset($data['status']) && $data['status'] == 'archived' ? 'selected' : '' ?>>
                Archived</option>
            </select>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="form-group">
            <label for="featured">Favorite</label>
            <select name="featured" id="featured" class="form-control">
              <option value="0" <?= isset($data['featured']) && $data['featured'] == 0 ? 'selected' : '' ?>>Tidak</option>
              <option value="1" <?= isset($data['featured']) && $data['featured'] == 1 ? 'selected' : '' ?>>Ya</option>
            </select>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?= $this->section('js') ?>
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });

  $('form').submit(function (e) {
    e.preventDefault();

    let content = quill.root.innerHTML;
    $('#content').val(content);
    console.log(content);

    this.submit();
  })

  let category = <?= json_encode($categories) ?>;

  const categoryDataset = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: category
  });
  $(document).ready(function () {
    $('#category').parent().css('display', 'block');
  });
  $('#category').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
  }, {
    name: 'category',
    source: categoryDataset
  }).on('typeahead:selected', function (e, data) {
    // console.log(data);
  });
</script>
<?= $this->endSection() ?>
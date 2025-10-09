<div class="row align-items-center justify-content-between mb-5">
  <div class="col">
    <h3><?= $title ?></h3>
    <p class="text-muted"><?= $subtitle ?></p>
  </div>
</div>

<form action="<?= base_url('dashboard/properti/store') ?>" method="post" enctype="multipart/form-data" id="form-create">
  <div id="wizard">
    <h1>Informasi Dasar</h1>
    <section class="card" id="step1">
      <?= $this->include('dashboard/properti/create_step1') ?>
    </section>

    <h1>Detail Properti</h1>
    <section class="card">
      <?= $this->include('dashboard/properti/create_step2') ?>
    </section>

    <h1>Fasilitas & Foto</h1>
    <section class="card">
      <?= $this->include('dashboard/properti/create_step3') ?>
    </section>

    <h1>Deskripsi</h1>
    <section class="card">
      <?= $this->include('dashboard/properti/create_step4') ?>
    </section>
  </div>
</form>

<?= $this->section('js') ?>
<script>
  $(function () {
    $("#wizard").steps({
      headerTag: "h1",
      bodyTag: "section",
      transitionEffect: "fade",
      autoFocus: true,
      onFinished: function (event, currentIndex) {
        $("#form-create").submit();
      },
      onStepChanged: function (event, currentIndex, priorIndex) {
        // Re-inisialisasi hanya step aktif
        let currentStep = $(".body.current");
        currentStep.find(".steps-select").each(function () {
          if (!$(this).data("select2")) {
            $(this).select2({
              dropdownParent: currentStep,
              width: "100%"
            });
          }
        });
        $(".steps-selects").select2({
          multiple: true,
          width: "100%",
        })
        $(".currency").on('keyup', function () {
          let value = $(this).val().replace(/[^0-9]/g, '');
          $(this).val(value ? parseInt(value).toLocaleString('id-ID') : '');
        });
      }
    });
    $('.dropify-step').dropify();
    $(document).on('dropify.afterClear', '.dropify-step', function (event, element) {
      $(this).closest('.col-3').remove();
    });
    $(document).on('change', '.dropify-step', function () {
      let parent = $('#upload-container');
      if ($(this).val()) {
        if ($('#upload-container .dropify-step').last().val() !== '') {
          parent.append(`
          <div class="col-3">
            <div class="form-group">
              <input type="file" class="dropify-step" name="images[]"
                data-allowed-file-extensions="jpg jpeg png"
                data-max-file-size="3M">
            </div>
          </div>
        `);
          parent.find('.dropify-step').last().dropify();
        }
      }
    });

    // Inisialisasi awal untuk step pertama
    let firstStep = $(".body.current");
    firstStep.find(".steps-select").select2({
      dropdownParent: firstStep,
      width: "100%"
    });
    $(".currency").on('keyup', function () {
      let value = $(this).val().replace(/[^0-9]/g, '');
      $(this).val(value ? parseInt(value).toLocaleString('id-ID') : '');
    });
  });

  $(document).on('change', '#type', function () {
    const category = $(this).find('option:selected').text().trim();
    $('#tipe').val(category);
  })

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
</script>
<?= $this->endSection() ?>
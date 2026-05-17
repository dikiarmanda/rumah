<?php

use Dompdf\Dompdf;
use Config\Services;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

function cetakPDF($filename, $data, $paper = 'A4', $oriented = 'potrait')
{
  $dompdf = new Dompdf();

  $options = $dompdf->getOptions();
  $options->setDefaultFont('Times New Roman');
  $options->setChroot(FCPATH);
  $options->setIsRemoteEnabled(true);
  $dompdf->setOptions($options);

  if (strtolower($paper) === 'f4') {
    // Ukuran F4: 595 x 935 point (portrait)
    $customPaper = [0, 0, 595.28, 935.43];
    $dompdf->setPaper($customPaper, $oriented);
  } else {
    $dompdf->setPaper($paper, $oriented);
  }

  $dompdf->loadHtml($data);
  $dompdf->render();
  $dompdf->stream($filename, array("Attachment" => 0));
  exit(0);
}

// function qrcode_generate($param)
// {
//   $writer = new PngWriter();

//   // Create QR code
//   $qrCode = QrCode::create($param)
//     ->setEncoding(new Encoding('UTF-8'))
//     ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
//     ->setSize(70)
//     ->setMargin(0, 0, 0, 10)
//     ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
//     ->setForegroundColor(new Color(0, 0, 0))
//     ->setBackgroundColor(new Color(255, 255, 255));

//   // Create generic logo
//   $logo = Logo::create(FCPATH . 'images/favicon.png')
//     ->setResizeToWidth(30);

//   // Create generic label
//   // $label = Label::create('umsida')
//   //     ->setTextColor(new Color(255, 0, 0));

//   $result = $writer->write($qrCode);

//   $dataUri = $result->getDataUri();
//   echo '<img src="' . $dataUri . '" alt="image">';
// }

function enkripsi($id)
{
  $encrypter = Services::encrypter();
  return bin2hex($encrypter->encrypt($id));
}

function dekripsi($id)
{
  $encrypter = Services::encrypter();
  return $encrypter->decrypt(hex2bin($id));
}

function generateRandomString($maxLength = 5)
{
  return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $maxLength);
}

function shortColumn($data1, $data2, $maxLength = 50)
{
  $result = ($data1 ?? '-') . ' / ' . ($data2 ?? '-');
  if (strlen($result) > $maxLength) {
    $result = ($data1 ?? '-') . ' /<br>' . ($data2 ?? '-');
  }
  return $result;
}

function strLimit($text, $limit, $end = '...')
{
  return strlen($text) > $limit ? substr($text, 0, $limit) . $end : $text;
}

function readMore($text, $limit = 50)
{
  if (strlen($text) > $limit) {
    return '<span class="str-limit">' . strLimit($text, $limit) . '</span>
        <span class="str-full d-none" style="white-space: pre">' . $text . '</span>
        <span class="badge badge-primary toggleReadMore">Read more</span>';
  } else {
    return $text;
  }
}

function numberToText($number)
{
  $angka = (int) $number;
  $satuan = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
  $belasan = ["sepuluh", "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"];
  $puluhan = ["", "", "dua puluh", "tiga puluh", "empat puluh", "lima puluh", "enam puluh", "tujuh puluh", "delapan puluh", "sembilan puluh"];
  $ribuan = ["", "ribu", "juta", "miliar", "triliun"];

  if ($angka == 0) {
    return "nol";
  }

  $text = "";
  $i = 0;
  while ($angka > 0) {
    $str = "";

    $ratusan = (int) ($angka % 1000 / 100);
    $puluhanAngka = $angka % 100;

    if ($ratusan > 0) {
      $str .= ($ratusan == 1 ? "seratus" : $satuan[$ratusan] . " ratus");
    }

    if ($puluhanAngka < 10) {
      $str .= " " . $satuan[$puluhanAngka];
    } elseif ($puluhanAngka < 20) {
      $str .= " " . $belasan[$puluhanAngka - 10];
    } else {
      $str .= " " . $puluhan[(int) ($puluhanAngka / 10)] . " " . $satuan[$puluhanAngka % 10];
    }

    if (trim($str) != "") {
      $text = trim($str) . " " . $ribuan[$i] . " " . $text;
    }

    $angka = (int) ($angka / 1000);
    $i++;
  }

  return ucwords(trim($text));
}

function shortNumber($number)
{
  $satuan = ['', 'Ribu', 'Juta', 'Miliyar', 'Triliun'];
  $nilai = (int) $number;
  $i = 0;
  while ($nilai >= 1000) {
    $nilai /= 1000;
    $i++;
  }

  return 'Rp. ' . round($nilai, 2) . ' <small>' . $satuan[$i] . '</small>';
}

function defaultValue($value, $default = '')
{
  return empty($value) ? $default : $value;
}

function range_tgl($tanggal_awal, $tanggal_akhir)
{
  $tgl_awal = date('j', strtotime($tanggal_awal));
  $tgl_akhir = date('j', strtotime($tanggal_akhir));
  $bulan_awal = get_bulan(date('n', strtotime($tanggal_awal)));
  $bulan_akhir = get_bulan(date('n', strtotime($tanggal_akhir)));
  $tahun_awal = date('Y', strtotime($tanggal_awal));
  $tahun_akhir = date('Y', strtotime($tanggal_akhir));

  if ($tanggal_awal == $tanggal_akhir) {
    return $tgl_awal . ' ' . $bulan_awal . ' ' . $tahun_awal;
  } else {
    if ($tahun_awal == $tahun_akhir) {
      if ($bulan_awal == $bulan_akhir) {
        return $tgl_awal . ' - ' . $tgl_akhir . ' ' . $bulan_awal . ' ' . $tahun_awal;
      } else {
        return $tgl_awal . ' ' . $bulan_awal . ' - ' . $tgl_akhir . ' ' . $bulan_akhir . ' ' . $tahun_awal;
      }
    } else {
      return $tgl_awal . ' ' . $bulan_awal . ' ' . $tahun_awal . ' - ' . $tgl_akhir . ' ' . $bulan_akhir . ' ' . $tahun_akhir;
    }
  }
}

function get_bulan($i = false)
{
  $i = (int) $i;
  $bulan = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
  ];
  if ($i) {
    return $bulan[$i];
  } else {
    return $bulan;
  }
}

function get_bulan_surat($source_date)
{
  // Konversi string tanggal ke timestamp
  $timestamp = strtotime($source_date);
  if (!$timestamp)
    return 'Tanggal tidak valid';

  // Ambil bulan dan tahun dari tanggal
  $bulan = date('n', $timestamp); // 1 - 12
  $tahun = date('Y', $timestamp);

  // Mapping angka ke Romawi
  $bulan_romawi = [
    1 => 'I',
    2 => 'II',
    3 => 'III',
    4 => 'IV',
    5 => 'V',
    6 => 'VI',
    7 => 'VII',
    8 => 'VIII',
    9 => 'IX',
    10 => 'X',
    11 => 'XI',
    12 => 'XII'
  ];

  return $bulan_romawi[$bulan] . '/' . $tahun;
}

function formatDate($date, $format = 'd-m-Y')
{
  if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    return $date;
  }
  $dateObject = new DateTime($date);
  $format = $dateObject->format('His') != '000000' ? $format . ' H:i' : $format;
  return $dateObject->format($format);
}

function tanggal_surat($source_date)
{
  $d = strtotime($source_date);

  $year = date('Y', $d);
  $month = date('n', $d);
  $day = date('d', $d);

  $month_names = array(
    '1' => 'Januari',
    '2' => 'Februari',
    '3' => 'Maret',
    '4' => 'April',
    '5' => 'Mei',
    '6' => 'Juni',
    '7' => 'Juli',
    '8' => 'Agustus',
    '9' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
  );

  $month_name = $month_names[$month];

  $date = "$day $month_name $year";

  return $date;
}

function tanggal_indo($source_date, $hari = false)
{
  $d = strtotime($source_date);

  $year = date('Y', $d);
  $month = date('n', $d);
  $day = date('d', $d);
  $day_name = date('D', $d);

  $day_names = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jum\'at',
    'Sat' => 'Sabtu'
  );
  $month_names = array(
    '1' => 'Januari',
    '2' => 'Februari',
    '3' => 'Maret',
    '4' => 'April',
    '5' => 'Mei',
    '6' => 'Juni',
    '7' => 'Juli',
    '8' => 'Agustus',
    '9' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
  );
  $day_name = $hari ? $day_names[$day_name] . ', ' : '';
  $month_name = $month_names[$month];

  $date = "$day_name $day $month_name $year";

  return $date;
}

function tanggal_hijriyah(string $source_date): string
{
  $date = date('d-m-Y', strtotime($source_date));
  $url = "https://api.aladhan.com/v1/gToH/{$date}";

  $response = @file_get_contents($url);
  if (!$response) {
    return 'Gagal mengonversi';
  }

  $json = json_decode($response, true);
  if (empty($json['data']['hijri'])) {
    return 'Gagal mengonversi';
  }

  $h = $json['data']['hijri'];
  $bulanMap = [
    1 => 'Muharam',
    2 => 'Safar',
    3 => 'Rabiul Awal',
    4 => 'Rabiul Akhir',
    5 => 'Jumadil Awal',
    6 => 'Jumadil Akhir',
    7 => 'Rajab',
    8 => 'Syaban',
    9 => 'Ramadan',
    10 => 'Syawal',
    11 => 'Zulkaidah',
    12 => 'Zulhijah',
  ];

  $tgl = intval($h['day']);
  $bulan = $bulanMap[$h['month']['number']] ?? $h['month']['en'];
  $tahun = $h['year'];

  return "{$tgl} {$bulan} {$tahun}H";
}

function get_hari($tanggal)
{
  $day_name = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jum`at',
    'Sat' => 'Sabtu'
  );
  $day = array_map('strtoupper', $day_name);

  $get_tgl = date('D', strtotime($tanggal));
  $h = $day[$get_tgl];
  return $h;
}

function url_active($url)
{
  $active = url_is($url) ? 'active' : '';
  return $active;
}

function boolToHtmlStatus($status): string
{
  if ($status == null) {
    return '-';
  }

  $icon = $status ? 'fa-circle-check text-success' : 'fa-circle-xmark text-danger';
  $statusText = $status ? 'Ya' : 'Tidak';

  return '<div class="d-flex flex-row justify-content-center align-items-center">
        <i class="fa-regular ' . $icon . ' icon-md m-0"></i>
        <p class="mb-0 ml-1">' . $statusText . '</p>
    </div>';
}

function uploadImage($file, $path)
{
  $file->move($path, $file->getClientOriginalName());
  return $file->getClientOriginalName();
}

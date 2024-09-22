<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title><?= $darren2->namawebsite?></title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="<?= base_url('images/logo/' . $darren2->icontab) ?>" >
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?=base_url("css/bootstrap.min.css")?>">
      <!-- site css -->
      <link rel="stylesheet" href="<?=base_url("style.css")?>">
      <!-- responsive css -->
      <link rel="stylesheet" href="<?=base_url("css/responsive.css")?>">
      <!-- color css -->
      <link rel="stylesheet" href="<?=base_url("css/colors.css")?>">
      <!-- select bootstrap -->
      <link rel="stylesheet" href="<?=base_url("css/bootstrap-select.css")?>"> 
      <!-- scrollbar css -->
      <link rel="stylesheet" href="<?=base_url("css/perfect-scrollbar.css")?>">
      <!-- custom css -->
      <link rel="stylesheet" href="<?=base_url("css/custom.css")?>">
      
     
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <script type="text/javascript">
    var idleTime = 0;
    var maxIdleTime = 5; // Waktu idle maksimal dalam menit sebelum logout otomatis

    // Fungsi untuk menginkrementasi waktu idle
    function timerIncrement() {
      idleTime++;
      if (idleTime >= maxIdleTime) { // Jika tidak ada aktivitas selama 5 menit
        alert("Anda telah otomatis logout karena tidak ada aktivitas selama 5 menit.");
        window.location.href = '<?= base_url("home/logout"); ?>'; // Ganti dengan URL logout
      }
    }

    // Set interval untuk menginkrementasi idleTime setiap 1 menit (60000 ms)
    var idleInterval = setInterval(timerIncrement, 60000); // 1 menit

    // Fungsi untuk mereset timer idle saat ada aktivitas (mouse, keyboard, scroll)
    function resetTimer() {
      idleTime = 0;
    }

    // Event listener untuk aktivitas pengguna
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onkeypress = resetTimer;
    window.onscroll = resetTimer;
  </script>
   </head>
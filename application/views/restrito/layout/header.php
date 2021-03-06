<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <?php echo (isset($titulo) ? '<title> Loja Virtual | '.$titulo.' </title>': '<title>Loja virtual | Vendo tudo</title>') ?>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/app.min.css') ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css') ?>">

  <?php if(isset($styles)) : ?>
      <?php foreach($styles as $style): ?>
        
        <link rel="stylesheet" href="<?php echo base_url('assets/'.$style);  ?>">

      <?php endforeach; ?>
  <?php endif; ?>


  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url('assets/img/favicon.ico') ?>' />

  
  <script src="http://cdn.ckeditor.com/4.5.11/standart/ckeditor.js"></script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
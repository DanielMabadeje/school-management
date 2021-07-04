<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/layout.css">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css">

    <style>
    
    
    html {
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI","Roboto","Oxygen","Ubuntu","Cantarell","Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
  font-weight: 300;
  font-size: 1em;
  line-height: 1.5;
  letter-spacing: 0.5px;
  background-color: #f9f9f9;
  color: #212121;
  overflow-y: scroll;
  min-height: 100%;
  box-sizing: border-box;
}
html, body {
  margin: 0;
  padding: 0;
}
h1, h2, h3, h4 {
  font-weight: 300;
  margin: 0;
}
#map {
  height: 90vh;
}

.header {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  flex-shrink: 0;
  box-sizing: border-box;
  align-self: stretch;
  align-items: center;
  width: 100%;
  height: 40px;
  padding: 24px 16px;
  color: #fff;
  background: #512da8;
  box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12);
}

.name-box {
  padding: 4px 20px;
  background: #673ab7;
  color: #fff;
}

.name-box input[type="text"] {
  padding: 8px 12px;
  font-size: 14px;
  border: 2px solid #ddd;
  outline: none;
}

.name-box input[type="text"]:focus {
  border-color: #ff4081;
}

.name-box button {
  color: #fff;
  padding: 10px;
  background: #ff4081;
  border-color: #ff4081;
  outline: none;
}

.hidden {
  display: none;
}

#delivery-heroes-list {
  padding: 4px 0;
}

.small {
  padding: 2px 6px !important;
}</style>
</head>

<body>
    <?php
    // require APPROOT . '/views/inc/navbar.php'; 
    ?>

    
    <div class="containe">
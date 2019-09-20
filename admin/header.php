<?php

//header.php

include('database_connection.php');

session_start();

if(!isset($_SESSION["admin_id"]))
{
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Système de présence des étudiants</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>!-->

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" /> -->

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap3-typeahead.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
</head>
<body>

<div class="jumbotron-small text-center" style="margin-bottom:0">
  <h1>Système de présence des étudiants</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="grade.php">Classe</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teacher.php">Professeur</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="student.php">Etudiants</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="attendance.php">Présence</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Se déconnecter</a>
      </li>  
    </ul>
  </div>  
</nav>
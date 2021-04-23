<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Cesar Francisco</title>
    <!-- jquery datatable css -->
    <link rel="stylesheet" href="cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="/user_guide/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand"><img src="/user_guide/_images/logo.png" alt="village88-logo"></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
<?php   if($this->session->userdata('is_logged_in')) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url()?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url().'dashboard' ?>" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url().'users/edit' ?>" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">Logout</a>
                    </li>
<?php   } else {?>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="signin" class="nav-link">Sign In</a>
                    </li>
<?php   } ?>
                </ul>
            </div>
        </div>
    </nav>
    
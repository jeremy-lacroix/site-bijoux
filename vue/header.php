<?php
session_start();
include_once("../model/Panier.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce Bijoux</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">
    <script src="../javascript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
  <body style="background-color: #E8AEB7;">

    <!-- START NAVBAR -->
    <div class="row m-0 bg-white"  style="height:15vh;" >

        <div class="col-md-4">

        </div>

        <div class="col-md-4 ">
            <div class="row m-0 justify-content-center">
                <img class="logo" src="../ressources/ring.png" ></img>
            </div>
        </div>

        <div class="col-md-4 h-100 p-3">
            <div class="d-flex justify-content-end m-0 h-100">
                <div class="col-xl-2">
                    <div class="p-3 d-flex justify-content-center">
                        <h3><i class="bi bi-person-fill"></i></h3>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="p-3 d-flex justify-content-center">
                        <h4><a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-basket3"></i></a></h4>
                        <h6><span class="badge text-bg-secondary my-auto" id="countPanier"></span><h6>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row m-0 justify-content-center bg-white" style="height:10vh;">
        
        <div class="col-md-5 m-auto">
            <ul class="nav nav-underline justify-content-evenly">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page.php">Nouveautés</a>
                </li>
                <li class="nav-item dropdown-center">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Femme</a>
                    <div class="dropdown-menu">
                        <div class="d-flex">
                            <ul class="p-0" style="list-style: none;">
                                <li><a class="dropdown-item" href="#">Collier</a></li>
                                <li><a class="dropdown-item" href="#">Boucle d'oreil</a></li>
                                <li><a class="dropdown-item" href="#">Piercing</a></li>
                            </ul>
                            <div class="vr"></div>
                            <ul class="p-0" style="list-style: none;">
                                <li><a class="dropdown-item" href="#">Bracelet</a></li>
                                <li><a class="dropdown-item" href="#">Bague</a></li>
                                <li><a class="dropdown-item" href="#">Montre</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown-center">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Homme</a>
                    <div class="dropdown-menu">
                        <div class="d-flex">
                            <ul class="p-0" style="list-style: none;">
                                <li><a class="dropdown-item" href="#">Collier</a></li>
                                <li><a class="dropdown-item" href="#">Boucle d'oreil</a></li>
                                <li><a class="dropdown-item" href="#">Piercing</a></li>
                            </ul>
                            <div class="vr"></div>
                            <ul class="p-0" style="list-style: none;">
                                <li><a class="dropdown-item" href="#">Bracelet</a></li>
                                <li><a class="dropdown-item" href="#">Bague</a></li>
                                <li><a class="dropdown-item" href="#">Montre</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- END NAVBAR -->
    
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Panier</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="panier">

        </div>
    </div>
<?php 
    include "header.php";
?>

    <!-- BODY -->
    <div class="row m-0" style="padding: 0!important;" >

        <div id="carouselExampleInterval" class="carousel slide pt-5 " style="padding-left: 0!important; padding-right: 0!important;" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 65vh" data-bs-interval="10000">
                    <img src="../ressources/menu1.jpg" class="d-block w-100 h-100" style="object-fit: cover;" alt="...">
                </div>
                <div class="carousel-item" style="height: 65vh" data-bs-interval="2000">
                    <img src="../ressources/menu2.jpg" class="d-block w-100 h-100" style="object-fit: cover;" alt="...">
                </div>
                <div class="carousel-item" style="height: 65vh">
                    <img src="../ressources/menu3.jpg" class="d-block w-100 h-100" style="object-fit: cover;" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

<?php 
    include "footer.php";
?>

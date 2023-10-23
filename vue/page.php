<?php 
    include "header.php";
?>

<div class="row m-0">
    
    <div class="col-md-3 d-flex justify-content-center ">

        <div class="sticky-top accordion col-xxl-10" id="accordionPanelsStayOpenExample">
            <div class="sticky-top pt-5 mt-4">
                <form name="myForm" method="POST" action="page.php">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Type de bijoux
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="d-block"><input type="radio" name="type" value="montre" onclick="javascript :submitForm()"> Montre</input></div>
                                <div class="d-block"><input type="radio" name="type" value="bague" onclick="javascript :submitForm()"> Bague</input></div>
                                <div class="d-block"><input type="radio" name="type" value="bracelet" onclick="javascript :submitForm()"> Bracelet</input></div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Accordion Item #2
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    
    <div class="col-md-8 p-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid bg-white rounded p-3" id="result" style="height: 200vh">
            
            <a class="btn btn-primary" onclick="javascript :ajouterAuPanier(01,'Produit 2',40,1,15.00)">add</a>
            

        </div>

        <nav aria-label="Page navigation example p-3">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

</div>

<script type="text/javascript">

    function submitForm()
    {
        var xhr = new XMLHttpRequest();
        var request = "action=getProduit"
        xhr.open("POST", "../controlleur/Ctl_Produit.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("result").innerHTML = xhr.response;

            }
        };

        // TYPE
        var type;
        var ele_1 = document.getElementsByName('type');

        /*
        // COLOR
        var type;
        var ele_2 = document.getElementsByName('color');
        */
 
        for (i = 0; i < ele_1.length; i++) {
            if (ele_1[i].checked)
                type = ele_1[i].value;
        }
        
        if(type != ""){
            request = request + "&type=" + type;
        }

        // COLOR

        xhr.send(request);

    };
</script>

<?php 
    include "footer.php";
?>
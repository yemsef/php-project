<?php
require 'navbar.php' ;
require 'connection.php';



$sql = "SELECT * FROM products ORDER BY created_at";
$result = mysqli_query($conn,$sql);

if ($result){
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC) ;
    mysqli_free_result($result);
    mysqli_close($conn);

}
else {
    echo " Query error:". mysqli_error($conn);
};

?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!-- component -->

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script>
    var cont=0;
function loopSlider(){
  var xx= setInterval(function(){
        switch(cont)
        {
        case 0:{
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-gray-800");
            $("#sButton2").addClass("bg-gray-800");
        cont=1;
        
        break;
        }
        case 1:
        {
        
            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-gray-800");
            $("#sButton1").addClass("bg-gray-800");
           
        cont=0;
        
        break;
        }
        
        
        }},8000);

}

function reinitLoop(time){
clearInterval(xx);
setTimeout(loopSlider(),time);
}



function sliderButton1(){

    $("#slider-2").fadeOut(400);
    $("#slider-1").delay(400).fadeIn(400);
    $("#sButton2").removeClass("bg-gray-800");
    $("#sButton1").addClass("bg-gray-800");
    reinitLoop(4000);
    cont=0
    
    }
    
    function sliderButton2(){
    $("#slider-1").fadeOut(400);
    $("#slider-2").delay(400).fadeIn(400);
    $("#sButton1").removeClass("bg-gray-800");
    $("#sButton2").addClass("bg-gray-800");
    reinitLoop(4000);
    cont=1
    
    }

    $(window).ready(function(){
        $("#slider-2").hide();
        $("#sButton1").addClass("bg-gray-800");
        

        loopSlider();
     
        
    
    
    
    
    });

  
  </script>
</head>

<body>
  <div class="sliderAx h-auto mt-5">
      <div id="slider-1" class="container mx-auto">
        <div class="bg-cover bg-center  h-auto text-white py-28 px-10 object-fill" style="background-image: url(https://lsmensclothing.com/wp-content/uploads/2018/03/mens-designer-suits-1.jpeg)">
       <div class="md:w-1/2">
        <p class="font-bold text-sm uppercase">COLLECTIONS</p>
        <p class="text-3xl font-bold">WELCOME TO THE HOME OF FASHION</p>
        <p class="text-2xl mb-10 leading-none">check out one of the best Men Quality wears....</p>
        <a href="#" class="bg-gray-900 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">BROWSE COLLECTION</a>
        </div>  
    </div> <!-- container -->
      <br>
      </div>

      <div id="slider-2" class="container mx-auto">
        <div class="bg-cover bg-top  h-auto text-white py-28 px-10 object-fill" style="background-image: url(https://netstorage-legit.akamaized.net/images/b88411a0846952ef.png?imwidth=900)">
       
  <p class="font-bold text-sm uppercase">COLLECTIONS</p>
        <p class="text-3xl font-bold">WE ARE EXPERTS IN BOTH ENGLISH AND NATIVES WEAR</p>
        <p class="text-2xl mb-10 leading-none">Check out one of our natives wears.....</p>
        <a href="#" class="bg-gray-900 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">BROWSE COLLECTION</a>
         
    </div> <!-- container -->
      <br>
      </div>
      
    </div>
 <div  class="flex justify-between w-12 mx-auto pb-2">
        <button id="sButton1" onclick="sliderButton1()" class="bg-gray-900 rounded-full w-4 pb-2 " ></button>
    <button id="sButton2" onclick="sliderButton2() " class="bg-gray-900 rounded-full w-4 p-2"></button>
  </div>


  <div class="flex flex-wrap justify-evenly ">
    <?php
    if (!empty($products)) {
        foreach ($products as $product) {
    ?>
        <div class="mx-5 mb-5 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img style="height: 300px; width:500px;" class="p-8 rounded-t-lg" src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo htmlspecialchars_decode($product['product_name']) ?></h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                    <p class="text-white">
                        <?php echo htmlspecialchars($product['product_description']) ?>
                    </p>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">$<?php echo htmlspecialchars($product['product_price']) ?></span>
                    <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                </div>
            </div>
        </div>
    <?php 
        }
    } else {
        echo "No products found.";
    }
    ?>
</div>

  
<?php require 'footer.php'; ?>
</body>
</html>







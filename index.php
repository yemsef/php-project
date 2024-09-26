<?php
require 'navbar.php' ;
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
<section class="w-auto h-auto flex-wrap">
    <!-- component -->
<!-- component -->
<div class="flex items-center min-h-screen">
    <div class="max-w-[720px] mx-auto">
        <div class="block mb-4 mx-auto border-b border-slate-300 pb-2 max-w-[360px]">
            <a 
                target="_blank" 
                href="https://www.material-tailwind.com/docs/html/card" 
                class="block w-full px-4 py-2 text-center text-slate-700 transition-all"
            >
                More collections of <b>Men Fashionable wears</b>.
            </a>
        </div>

        <!-- Centering wrapper -->
        <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
            <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-96">
                <img
                    src="https://images.unsplash.com/photo-1629367494173-c78a56567877?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=927&amp;q=80"
                    alt="card-image" class="object-cover w-full h-full" />
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                        Apple AirPods
                    </p>
                    <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                        $95.00
                    </p>
                </div>
                <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                    With plenty of talk and listen time, voice-activated Siri access, and an
                    available wireless charging case.
                </p>
            </div>
            <div class="p-6 pt-0">
                <button
                    class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 focus:opacity-[0.85] active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:scale-105 hover:shadow-none focus:scale-105 focus:shadow-none active:scale-100"
                    type="button">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>

</section>
<?php

require 'footer.php';
?>
</body>
</html>







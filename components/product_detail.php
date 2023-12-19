<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<section class="py-12 sm:py-16"> 
  <div class="container mx-auto px-4">


    <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
      <div class="lg:col-span-3 row-end-1">
        <div class="flex justify-center">
   
            <div class="max-w-xl overflow-hidden rounded-lg">
              <img class="h-full w-full max-w-full object-cover" src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="" />
            </div>
       

          
        </div>
      </div>

      <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
        <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">Product name Yassine</h1>
        

    

        
        <!-- part Banner  -->
        <div class="mt-3 flex select-none flex-wrap items-center gap-1">
        <ul class="mt-8 space-y-2">
          <li class="flex items-center text-left text-sm font-medium text-gray-600">
            <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
            </svg>
            Free shipping worldwide
          </li>

          <li class="flex items-center text-left text-sm font-medium text-gray-600">
            <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
            </svg>
            Cancel Anytime
          </li>
        </ul>
        </div>
  <!-- part Banner  -->

    <!-- part Price  -->
       
    
        <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0 mb-4">
          <div class="flex items-end">
            <h1 class="text-3xl font-bold">$60.50</h1>
            <span class="text-base">/month</span>
          </div>
        </div>
            <!-- part Price  -->
        <div class="text-[#559f45] text-md flex justify-center items-center"><span class="text-[#559f45] text-sm px-1 my-2">✓</span>Produit en stock (50)</div>

            <!-- part btns  -->
        <div class="flex  items-center   justify-center gap-2 mt-2">
          
<!-- Input Number -->
<div class="bg-white border border-gray-200 rounded-lg dark:bg-slate-900 dark:border-gray-700" >
  <div class="w-full flex justify-between items-center gap-x-1">
    <div class="grow  px-3">
      <span id="valueDisplay" class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 focus:border-none focus:ourline-none dark:text-white"  >1</span>
    </div>


    <div class="flex flex-col -gap-y-px divide-y divide-gray-200 border-s border-gray-200 dark:divide-gray-700 dark:border-gray-700">
    
      <button id="increase_btn"  onclick="increaseValue()" class="w-7  inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-increment>
       +  
      </button>
      <button id="decrease_btn" onclick="decreaseValue()" class="w-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-se-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-decrement>
      -
      </button>
    </div>
    
  </div>
</div>
<!-- End Input Number -->


        <button class="relative group w-3/6 p-2 text-center bg-white text-[#19488f] text-sm border border-[#19488f] hover:bg-[#19488f] hover:text-white hover:border-transparent">
  <span class="absolute px-4    top-0 left-0 bottom-0 right-full transition-right duration-300 ease-in bg-[#19488f] text-white text-base flex justify-center items-center group-hover:right-0">+</span>
  Ajouter au panier
</button>

     
          </div>
       <!-- part btns  -->
       
      </div>

      <div class="lg:col-span-3">
        <div class="border-b border-gray-300">
          <nav class="flex gap-4">
            <a href="#" title="" class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800"> Description </a>

            
          </nav>
        </div>

        <div class="mt-8 flow-root sm:mt-12">
          <h1 class="text-3xl font-bold">Delivered To Your Door</h1>
          <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia accusantium nesciunt fuga.</p>
          <h1 class="mt-8 text-3xl font-bold">From the Fine Farms of Brazil</h1>
          <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio numquam enim facere.</p>
          <p class="mt-4">Amet consectetur adipisicing elit. Optio numquam enim facere. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore rerum nostrum eius facere, ad neque.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // JavaScript code to handle button clicks and update the value
  var valueElement = document.getElementById("valueDisplay");

  function increaseValue() {
    var currentValue = parseInt(valueElement.innerText, 10);
    valueElement.innerText = currentValue + 1;
  }

  function decreaseValue() {
    var currentValue = parseInt(valueElement.innerText, 10);
    if (currentValue > 1) {
      valueElement.innerText = currentValue - 1;
    }
  }
</script>
</body>
</html>
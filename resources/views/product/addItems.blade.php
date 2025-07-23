<x-userLayout>



<div class=" flex justify-center items-center  sm:m-a">
<form action="{{route('product.storeItems')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="grid gap-0 grid-cols-1 w-full max-w-2xl my-3 p-5 m-auto border border-gray-300 rounded-lg shadow-lg  flex justify-center  items-center ">
<div class=" grid gap-0 sm:gap-6 grid-cols-1 sm:grid-cols-2 ">

<div>
    <label class="m-1"for="product_name">Product Name:</label>
 
  <input 
    type="text"
    name="product_name"
     id="product_name"
    required
    value="{{old('product_name')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Product Name"

  >
        @error('product_name')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
           

  </div>

  <div>
    <label class="m-1"for="product_category">Product Category:</label>
    <select 
    <?php
    $products_category = ["Vegetable", "Fruit", "Fish", "Meat"];
    ?>

    name="product_category"
    id="product_category"
    required
    value="{{old('product_category')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="First Name"

  >
    <?php foreach ($products_category as $product_cat): ?>
            <option value="<?= $product_cat ?>"><?= $product_cat ?></option>
        <?php endforeach; ?>
</select>


  </div>



  <!-- second row -->
   <div>
    <label id="product_price_chosen" class="m-1"for="product_price">Price per Kilogram:</label>
  <input 
    type="number" 
      min="1"
    step="0.01"
    name="product_price"
      id="product_price"
    required
    value="{{old('product_price')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Price"

  >
        @error('product_price')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>
  <div>
     <label class="m-1"for="product_unit">Unit:</label>
  <select 
 <?php
$products_unit=["kg", "pcs"];
 ?>
    type="number" 
      min="1"

    name="product_unit"
      id="product_unit"
    required
    value="{{old('product_unit')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Unit"

  >
   <?php foreach ($products_unit as $product_unit): ?>
            <option value="<?= $product_unit ?>"><?= $product_unit ?></option>
        <?php endforeach; ?>
  </select>

  </div>

  <!-- third row -->

   <div>
     <label class="m-1"for="product_qty">Available:</label>
  <input 
    type="number" 
      min="1"
      step="1.0"

    name="product_qty"
      id="product_qty"
    required
    value="{{old('product_qty')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Quantity like 1, 2, 3, 4, 5'"

  >

          @error('product_qty')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
  </div>

  <!-- for altering between qty or weight -->
   <script>
   const unit_selected= document.getElementById("product_unit");
   const availability= document.getElementById("product_qty");
      const priceChosen= document.getElementById("product_price_chosen");
   unit_selected.addEventListener('change',()=>{

   if(unit_selected.value === 'kg'){
    availability.placeholder = 'Quantity like 1, 2, 3, 4, 5';
      availability.step="1.0";
      priceChosen.innerText="Price per kilograms"
   }else{

  availability.placeholder = 'Weight(kg) like 1.25, 2.50, 3.75, 4, 5';
  availability.step=".25";
      priceChosen.innerText="Price per piece"
   }

   });

   </script>


<div>
     <label class="m-1"for="product_freshness">Freshness:</label>
  <select 
 <?php
$products_unit=["fresh", "frozen", "day-old"];
 ?>
    type="number" 
      min="1"

    name="product_freshness"
      id="product_freshness"
    required
    value="{{old('product_freshness')}}"

        class="w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Freshness"

  >
   <?php foreach ($products_unit as $product_unit): ?>
            <option value="<?= $product_unit ?>"><?= $product_unit ?></option>
        <?php endforeach; ?>
  </select>

  </div>

     <div>
    <label class="m-1"for="harvest_date">Harvest Date:</label>
  <input 
    type="text" 

    name="harvest_date"
      id="harvest_date"
    required
    value="{{old('harvest_date')}}"

        class="form-control w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Harvest Date"

  >

<!-- Include Flatpickr CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Initialize Flatpickr -->
<script>
  flatpickr("#harvest_date", {
    dateFormat: "Y-m-d", // Same format as used in Laravel (e.g., 2025-07-21)
    maxDate: "today" // Optional: prevent future dates
  });
</script>
  </div>
  

       <div>
    <label class="m-1" for="product_image">Product Image:</label>
  <input 
    type="file" 

    name="product_image"
      id="product_image"
      accept="image/*"
    required
    value="{{old('harvest_date')}}"

        class="form-control w-[330px] sm:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Harvest Date"

  >

          @error('product_image')
              <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror

  </div>  
  <div>
     <label class="m-1"for="deliver_availability">Deliver Availability:</label>
  <select 
 <?php

 ?>
    type="number" 
      min="1"

    name="deliver_availability"
      id="deliver_availability"
    required
    value="{{old('deliver_availability')}}"

        class="w-[330px] sm:w-[300px]  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Unit"

  >
   
            <option value="1">True</option>
                <option value="0">False</option>
       
  </select>

  </div>

    <div>
     <label class="m-1"for="pick_up_availability">Pick-up Availability::</label>
  <select 
 <?php

 ?>
    type="number" 
      min="1"

    name="pick_up_availability"
      id="pick_up_availability"
    required
    value="{{old('pick_up_availability')}}"

        class="w-[330px] sm:w-[300px] md:w-[300px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  mb-3" placeholder="Unit"

  >
  <option value="1">True</option>
                <option value="0">False</option>
  </select>

  </div>

</div>

<div class="grid gap-0 grid-cols-1  sm:grid-cols-3 w-full flex justify-center items-center sm:pl-6 ">




<button type="submit" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
  Store Items
</button>
</form>


<button name="reset" id="reset" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-amber-300 dark:focus:ring-amber-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
  Reset Items
</button>


<a href="{{route('user.sellView')}}" class="w-[330px] sm:w-[150px] text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">

  Back
</a>



</div>
</div>

</div>





<script>

const resetButton=document.getElementById("reset");

const resetName=document.getElementById("product_name");
const resetPrice=document.getElementById("product_price");
const resetQty=document.getElementById("product_qty");
const resetDate=document.getElementById("harvest_date");
const resetImage=document.getElementById("product_image");
  resetButton.addEventListener('click',()=>{
   
  
resetName.value="";
resetPrice.value="";
resetQty.value="";
resetDate.value="";
resetImage.value="";

  });

</script>



</x-userLayout>
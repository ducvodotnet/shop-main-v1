<?php require_once 'core/boot.php'; ?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>
    Elessi - Classic Sweater
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
    }
  </style>
</head>

<body>
  <?php
  include "inc/header.php";
  ?>
  <?php $product = get_product($_GET['id']); ?>
  <!-- Content here -->
  <div class="container mx-auto mt-8">
    <!-- Product Details -->
    <div class="bg-white p-6">
      <!-- Product Images and Info -->
      <div class="flex">
        <!-- Product Images -->
        <div class="w-1/2 space-y-4">
          <img alt="Classic Sweater main image" class="w-full" height="800" src="<?php echo $product['image']; ?>" width="600" />
          <div class="flex space-x-2">
            <img alt="Classic Sweater thumbnail image" class="w-1/4" height="100" src="<?php echo $product['image']; ?>" width="100" />
            <img alt="Classic Sweater thumbnail image" class="w-1/4" height="100" src="<?php echo $product['image']; ?>" width="100" />
            <img alt="Classic Sweater thumbnail image" class="w-1/4" height="100" src="<?php echo $product['image']; ?>" width="100" />
            <img alt="Classic Sweater thumbnail image" class="w-1/4" height="100" src="<?php echo $product['image']; ?>" width="100" />
          </div>
        </div>
        <!-- Product Info -->
        <div class="w-1/2 pl-8">
          <h1 class="text-3xl font-bold mb-2">
            <?php echo $product['name']; ?>
          </h1>
          <div class="flex items-center mb-4">
            <div class="text-yellow-400">
              <i class="fas fa-star">
              </i>
              <i class="fas fa-star">
              </i>
              <i class="fas fa-star">
              </i>
              <i class="fas fa-star">
              </i>
              <i class="fas fa-star">
              </i>
            </div>
            <a class="ml-2 text-sm text-gray-600" href="#">
              (1 customer review)
            </a>
          </div>
          <p class="text-2xl text-red-500 font-bold">
            $<?php echo $product['price']; ?>
          </p>
          <p class="text-sm text-gray-500 mt-4">
            14 sold in last 7 hours
          </p>
          <p class="mt-4">
            Lorem ipsum has been the industry's standard dummy text ever since the 1500s.
          </p>
          <!-- Product Actions -->
          <div class="flex items-center mt-4">
            <div class="pr-4">
              <label class="sr-only" for="quantity">
                Quantity
              </label>
              <input class="border border-gray-300 rounded-md p-2" id="quantity" min="1" name="quantity" type="number" value="1" />
            </div>
            <button class="bg-black text-white px-8 py-2 rounded-md">
              ADD TO CART
            </button>
            <button class="bg-red-500 text-white px-8 py-2 rounded-md ml-2">
              BUY NOW
            </button>
          </div>
          <!-- Product Details -->
          <div class="mt-4">
            <p>
              Only 35 items left in stock.
            </p>
            <div class="flex items-center mt-2">
              <i class="fas fa-truck mr-2">
              </i>
              <p>
                Estimated Delivery: Nov 21 – Nov 25
              </p>
            </div>
            <p class="mt-2">
              42 people are viewing this right now
            </p>
          </div>
          <!-- Share and Save -->
          <div class="flex items-center mt-4">
            <button class="text-gray-500 mr-2">
              <i class="fas fa-share-alt">
              </i>
            </button>
            <button class="text-gray-500">
              <i class="fas fa-heart">
              </i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Description, Reviews, Custom Tab -->
    <div class="bg-white p-6 mt-8">
      <!-- Description -->
      <div class="mb-8">
        <h2 class="text-xl font-bold mb-4">
          Description
        </h2>
        <p>
          <?php echo $product['description']; ?>
        </p>
      </div>
      <!-- Reviews -->
      <div class="mb-8">
        <h2 class="text-xl font-bold mb-4">
          Reviews (1)
        </h2>
        <!-- Review -->
        <div class="border-t border-gray-200 pt-4">
          <p class="text-sm text-gray-600">
            Based On 1 Reviews
          </p>
          <div class="flex items-center mt-2">
            <div class="text-yellow-400">
              <i class="fas fa-star">
              </i>
              <i class="fas fa-star">
              </i>
              <i class="fas fa-star">
              </i>
              <i class="fas fa-star">
              </i>
              <i class="fas fa-star">
              </i>
            </div>
            <p class="ml-2 text-sm text-gray-600">
              5.00 Overall
            </p>
          </div>
        </div>
      </div>
      <!-- Custom Tab -->
      <div>
        <h2 class="text-xl font-bold mb-4">
          Custom Tab
        </h2>
        <p>
          Used for all products of this categories
        </p>
      </div>
    </div>
    <!-- Related Products -->
    <div class="bg-white p-6 mt-8">
      <h2 class="text-xl font-bold mb-4">
        Related Products
      </h2>
      <div class="flex space-x-4">
        <div class="w-1/4">
          <img alt="Gathered Sleeve" class="w-full" height="100" src="public/img/Sample_Product_Image3-26.jpg" width="100" />
          <p class="text-sm mt-2">
            Gathered Sleeve
          </p>
          <p class="text-sm text-gray-500">
            $60.00
          </p>
        </div>
        <div class="w-1/4">
          <img alt="Short T-Shirt" class="w-full" height="100" src="public/img/Sample_Product_Image3-26.jpg" width="100" />
          <p class="text-sm mt-2">
            Short T-Shirt
          </p>
          <p class="text-sm text-gray-500">
            $19.00
          </p>
        </div>
        <div class="w-1/4">
          <img alt="Chenille Sweater" class="w-full" height="100" src="public/img/Sample_Product_Image3-26.jpg" width="100" />
          <p class="text-sm mt-2">
            Chenille Sweater
          </p>
          <p class="text-sm text-gray-500">
            $23.00
          </p>
        </div>
        <div class="w-1/4">
          <img alt="Young Black" class="w-full" height="100" src="public/img/Sample_Product_Image3-26.jpg" width="100" />
          <p class="text-sm mt-2">
            Young Black
          </p>
          <p class="text-sm text-gray-500">
            $89.00
          </p>
        </div>
      </div>
    </div>
  </div>
  <?php
  include "inc/footer.php";
  ?>
</body>

</html>
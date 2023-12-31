<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>
    Shopping Cart
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');

    body {
      font-family: 'Open Sans', sans-serif;
    }
  </style>
</head>

<body class="bg-white">
  <?php
  include "inc/header.php";
  ?>
  <div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">
            Shopping Cart
          </h1>

        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
            Product
          </h3>
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">
            Price
          </h3>
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">
            Quantity
          </h3>
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5 text-center">
            Subtotal
          </h3>
        </div>
        <?php $cart_list = get_cart(); ?>
        <?php foreach ($cart_list as $order_detail) { ?>
          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
            <div class="flex w-2/5">
              <div class="w-20">
                <img alt="Yellow short-sleeved t-shirt with Kaws design" class="h-24" height="100"
                  src="<?php echo $order_detail['image'] ?>" width="100" />
              </div>
              <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm">
                  <?php echo $order_detail['name'] ?>
                </span>
                <span class="text-red-500 text-xs">
                  Style: Ladies-Tee
                </span>
                <span class="text-gray-500 text-xs">
                  Color: Yellow
                </span>
                <span class="text-gray-500 text-xs">
                  Size: XL
                </span>
                <a class="font-semibold hover:text-red-500 text-gray-500 text-xs" href="#">
                  Remove
                </a>
              </div>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm">
              $
              <?php echo $order_detail['price'] ?>
            </span>
            <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300">
              <form action="cart.php" method="post"
                class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="value" value="-1">
                <input type="hidden" name="productId" value="<?php echo $order_detail['product_id']; ?>">
                <button type="submit">-</button>
              </form>
              <div class="h-8 w-10 flex items-center justify-center">
                <?php echo $order_detail['quantity']; ?>
              </div>
              <form action="cart.php" method="post"
                class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="value" value="1">
                <input type="hidden" name="productId" value="<?php echo $order_detail['product_id']; ?>">
                <button type="submit">+</button>
              </form>
            </div>
            <span class="text-center w-2/5 font-semibold text-sm">
              $
              <?php echo total_cart_item($order_detail['price'], $order_detail['quantity']); ?>
            </span>
            <div class="text-gray-600 hover:text-primary cursor-pointer">
              <form action="cart.php" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="productId" value="<?php echo $order_detail['product_id']; ?>">
                <button type="submit" class="fas fa-trash"></button>
              </form>
            </div>
          </div>
        <?php } ?>
        <a class="flex font-semibold text-indigo-600 text-sm mt-10" href="#">
          <svg class="fill-current mr-2 text-indigo-600 w-4" viewbox="0 0 448 512">
            <path
              d="M134.059 296H24c-13.255 0-24-10.745-24-24V24C0 10.745 10.745 0 24 0h282.059c13.255 0 24 10.745 24 24v248c0 13.255-10.745 24-24 24H214.059v10c0 13.255-10.745 24-24 24h-40c-13.255 0-24-10.745-24-24v-10zm214.059-24H376c-13.255 0-24-10.745-24-24V24c0-13.255 10.745-0 24-0h72.118c13.255 0 24 10.745 24 24v224c0 13.255-10.745 24-24 24z">
            </path>
          </svg>
          Continue Shopping
        </a>
      </div>
      <div class="w-1/4 px-8 py-10 bg-gray-100" id="summary">
        <h1 class="font-semibold text-2xl border-b pb-8">
          Order Summary
        </h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-sm uppercase">
            Subtotal
          </span>
          <span class="font-semibold text-sm">
            $
            <?php echo total_cart(); ?>
          </span>
        </div>
        <div>
          <label class="font-medium inline-block mb-3 text-sm uppercase">
            Shipping
          </label>
          <select class="block p-2 text-gray-600 w-full text-sm">
            <option>
              Standard shipping - Free
            </option>
          </select>
        </div>
        <div class="py-10">
          <label class="font-semibold inline-block mb-3 text-sm uppercase" for="promo">
            Promo Code
          </label>
          <input class="p-2 text-sm w-full" id="promo" placeholder="Enter your code" type="text" />
        </div>
        <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">
          Apply
        </button>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>
              Total cost
            </span>
            <span>
              $
              <?php echo total_cart(); ?>
            </span>
          </div>
          <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
            <a href="checkout.php">Checkout</a>

          </button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php
  include "inc/footer.php";
  ?>
</body>

</html>
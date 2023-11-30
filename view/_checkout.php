<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Checkout
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Open+Sans', sans-serif;
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
                    <h1 class="font-semibold text-2xl">Elessi.</h1>
                </div>
                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Shipping address</h3>
                </div>
                <div class="flex -mx-2">
                    <div class="w-1/2 px-2">
                        <label for="first_name" class="block text-sm text-gray-600">First name *</label>
                        <input type="text" id="first_name" placeholder="Your first name" class="w-full p-2 text-sm border rounded">
                    </div>
                    <div class="w-1/2 px-2">
                        <label for="last_name" class="block text-sm text-gray-600">Last name *</label>
                        <input type="text" id="last_name" placeholder="Your last name" class="w-full p-2 text-sm border rounded">
                    </div>
                </div>
                <div class="flex -mx-2 mt-4">
                    <div class="w-full px-2">
                        <label for="company" class="block text-sm text-gray-600">Company name (optional)</label>
                        <input type="text" id="company" placeholder="Your company name" class="w-full p-2 text-sm border rounded">
                    </div>
                </div>
                <div class="flex -mx-2 mt-4">
                    <div class="w-full px-2">
                        <label for="country" class="block text-sm text-gray-600">Country / Region *</label>
                        <select id="country" class="w-full p-2 text-sm border rounded">
                            <option>Vietnam</option>
                        </select>
                    </div>
                </div>
                <div class="flex -mx-2 mt-4">
                    <div class="w-full px-2">
                        <label for="street_address" class="block text-sm text-gray-600">House number and street name</label>
                        <input type="text" id="street_address" placeholder="Your address" class="w-full p-2 text-sm border rounded">
                    </div>
                </div>
                <div class="flex -mx-2 mt-4">
                    <div class="w-1/2 px-2">
                        <label for="postcode" class="block text-sm text-gray-600">Postcode / ZIP</label>
                        <input type="text" id="postcode" placeholder="Your postcode" class="w-full p-2 text-sm border rounded">
                    </div>
                    <div class="w-1/2 px-2">
                        <label for="city" class="block text-sm text-gray-600">Town / City *</label>
                        <input type="text" id="city" placeholder="Your city" class="w-full p-2 text-sm border rounded">
                    </div>
                </div>
                <div class="flex -mx-2 mt-4">
                    <div class="w-full px-2">
                        <label for="phone" class="block text-sm text-gray-600">Phone *</label>
                        <input type="text" id="phone" placeholder="Your phone number" class="w-full p-2 text-sm border rounded">
                    </div>
                </div>

                <button class="bg-red-500 px-6 py-2 text-sm text-white uppercase mt-4">
                    Return to cart
                </button>
            </div>
            <div class="w-1/4 px-8 py-10 bg-gray-100" id="summary">
                <h1 class="font-semibold text-2xl border-b pb-8">
                    Order Summary
                </h1>
                <?php $cart_list = get_cart(); ?>
                <?php foreach ($cart_list as $order_detail) { ?>
                <div class="flex justify-between mt-10 mb-5">

                        <div class="flex">
                            <img alt="Placeholder image of a yellow short-sleeved shirt labeled 'Short Sleeved Kaws'" class="h-20" height="100" src="<?php echo $order_detail['image'] ?>" width="100" />
                            <div class="ml-4 flex flex-col">
                                <span class="font-bold text-sm">
                                    <?php echo $order_detail['name'] ?>
                                </span>
                                <span class="text-red-500 text-xs">
                                    Quantity: <?php echo $order_detail['quantity']; ?>
                                </span>
                                <span class="text-sm font-semibold">
                                    $<?php echo $order_detail['price'] ?>
                                </span>
                            </div>
                        </div>

                </div>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            $<?php echo $order_detail['price'] ?>
                        </span>
                    </div>
                    <div class="flex justify-between py-6 text-sm">
                        <span>
                            Shipping
                        </span>
                        <span>
                            Flat rate: $0
                        </span>
                    </div>
                    <?php } ?>
                    <div class="border-t mt-8">
                        <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                            <span>
                                Total Cost
                            </span>
                            <span>
                                $<?php echo total_cart(); ?>
                            </span>
                        </div>
                        
                        <div class="border-t border-gray-300 pt-4">
                            <p class="text-sm my-2">
                                Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                            </p>
                            <label class="inline-flex items-center">
                                <input class="form-radio text-indigo-600" name="payment" type="radio" />
                                <span class="ml-2">
                                    Direct bank transfer
                                </span>
                            </label>
                            <label class="inline-flex items-center">
                                <input class="form-radio text-indigo-600" name="payment" type="radio" />
                                <span class="ml-2">
                                    Cash on delivery
                                </span>
                            </label>
                            <label class="inline-flex items-center">
                                <input class="form-radio text-indigo-600" name="payment" type="radio" />
                                <span class="ml-2">
                                    PayPal
                                </span>
                            </label>
                        </div>
                        <p class="text-sm my-4">
                            Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our
                            <a class="text-blue-600" href="#">
                                privacy policy
                            </a>
                            .
                        </p>
                        <div class="flex items-center mb-4">
                            <input class="form-checkbox text-indigo-600" id="terms" type="checkbox" />
                            <label class="ml-2 text-sm" for="terms">
                                I have read and agree
                                <a class="text-blue-600" href="#">
                                    terms and conditions
                                </a>
                                *
                            </label>
                        </div>
                        <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                            <a href="xuly-order.php">Order</a>
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
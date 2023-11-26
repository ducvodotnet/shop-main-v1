<?php require_once 'core/boot.php'; ?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Home
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-700">
    <?php
    include "inc/header.php";
    ?>
    <main class="container mx-auto px-6">
        <!-- Promo section -->
        <section class="my-10">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-6xl font-bold text-gray-800">
                        LIMITED TIME
                    </h2>
                    <p class="text-4xl font-bold text-green-500 my-4">
                        30% Off
                    </p>
                    <p class="text-xl text-gray-700 mb-6">
                        with promo code
                    </p>
                    <button class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
                        SHOP NOW
                    </button>
                </div>
                <img alt="Promotional products including a green t-shirt, a black t-shirt, a white tote bag, and various stickers with different logos" class="rounded-lg shadow-lg" src="https://placehold.co/500x300" />
            </div>
        </section>
        <!-- Featured Categories -->
        <section class="my-10">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Featured Categories
            </h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <?php $category_list = get_all_categories() ?>
                <?php foreach ($category_list as $category) { ?>
                    <div class="text-center">
                        <img alt="Men category image" class="mx-auto mb-2" src="<?php echo $category['image']; ?>" />
                        <p>
                            <a href="category.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                        </p>
                    </div>
                <?php } ?>
                </div>
        </section>
        <!-- Recommend For You -->
        <section class="my-10">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Recommend For You
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Product-->
                <?php $product_list = get_all_products();
                ?>
                <?php foreach ($product_list as $product) {
                ?>
                        <div class="border rounded-lg overflow-hidden">
                            <img alt="Yellow short-sleeved t-shirt with a black graphic on the chest" class="w-full" src="<?php echo $product['image']; ?>" />
                            <div class="p-4">
                                <h4 class="font-bold">
                                    <a href="product-detail.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                </h4>
                                <p class="text-gray-500">
                                    $<?php echo $product['price']; ?>
                                </p>
                                <div class="flex justify-between items-center mt-4">
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="far fa-heart">
                                        </i>
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-shopping-cart">
                                        </i>
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-search">
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                <?php }
                ?>
            </div>
            <div class="text-center mt-6">
                <button class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300">
                    LOAD MORE ...
                </button>
            </div>
        </section>
        <!-- Banner section -->
        <section class="my-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-yellow-100 p-6 rounded-lg text-center">
                    <h4 class="font-bold text-gray-800 mb-2">
                        Bag with rose pattern
                    </h4>
                    <p class="text-gray-500 mb-4">
                        Sale off 25%
                    </p>
                    <button class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                        Shop now
                    </button>
                </div>
                <div class="bg-pink-100 p-6 rounded-lg text-center">
                    <h4 class="font-bold text-gray-800 mb-2">
                        Hello Summer
                    </h4>
                    <p class="text-gray-500 mb-4">
                        Shop now
                    </p>
                    <button class="bg-pink-500 text-white px-6 py-2 rounded hover:bg-pink-600">
                        Shop now
                    </button>
                </div>
                <div class="bg-teal-100 p-6 rounded-lg text-center">
                    <h4 class="font-bold text-gray-800 mb-2">
                        Let' Party Hard Pillow
                    </h4>
                    <p class="text-gray-500 mb-4">
                        Shop now
                    </p>
                    <button class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600">
                        Shop now
                    </button>
                </div>
            </div>
        </section>
        <!-- Featured Items -->
        <section class="my-10">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Featured Items
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Product-->
                <?php $product_list = get_all_products();
                ?>
                <?php foreach ($product_list as $product) {
                ?>
                        <div class="border rounded-lg overflow-hidden">
                            <img alt="Yellow short-sleeved t-shirt with a black graphic on the chest" class="w-full" src="<?php echo $product['image']; ?>" />
                            <div class="p-4">
                                <h4 class="font-bold">
                                    <a href="product-detail.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                </h4>
                                <p class="text-gray-500">
                                    $<?php echo $product['price']; ?>
                                </p>
                                <div class="flex justify-between items-center mt-4">
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="far fa-heart">
                                        </i>
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-shopping-cart">
                                        </i>
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-search">
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                <?php }
                ?>
        </section>
        <!-- Promo section -->
        <section class="my-10">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-6xl font-bold text-gray-800">
                        NEW DESIGN
                    </h2>
                    <p class="text-4xl font-bold text-yellow-500 my-4">
                        Up to 50% Off
                    </p>
                    <p class="text-xl text-gray-700 mb-6">
                        All T-Shirt &amp; Accessories
                    </p>
                    <button class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                        SHOP NOW
                    </button>
                </div>
                <img alt="Promotional t-shirts in white, black, and yellow with various graphics on the chest" class="rounded-lg shadow-lg" src="https://placehold.co/500x300" />
            </div>
        </section>
        <!-- Footer -->
        <?php
        include "inc/footer.php";
        ?>
    </main>
</body>

</html>
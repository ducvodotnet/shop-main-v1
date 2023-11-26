<?php require_once 'core/boot.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/fonts/fontawesome/all.css">
</head>

<body>
    <?php
    include "./view/inc/header.php";
    ?>
    <div class="breadcrumb">
        <img src="./public/img/elessi-bg2.jpg" alt="">
        <div class="text">
            <h2>Men</h2>
            <p>Home > T-Shirt</p>
        </div>
    </div>
    <section class="my-10">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Product-->
                <?php $product_list = get_products_by_category($_GET['category_id']); ?>
                <?php foreach ($product_list as $product) { ?>
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
    </div>
    <?php
    include "./view/inc/footer.php";
    ?>
    </section>
</body>

</html>
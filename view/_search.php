<?php require_once 'core/boot.php'; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>

<body>
    <?php
    include "inc/header.php";
    ?>
    <div class="flex items-center justify-between p-6">
        <!-- Close button -->
        <div></div> <!-- Placeholder for symmetry -->

        <!-- Search input -->
        
            <div class="flex-grow mx-10">
                <h2 class="text-2xl font-semibold mb-3 text-center	">Search</h2>
                <form action="search.php" method="get">
                <div class="flex items-center border-b-2 border-gray-300">
                
                    <input  name="search" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Search...">
                    <button class="text-gray-500 focus:outline-none" >
                        <i class="fas fa-search"></i>
                    </button>
                    
                </div>
                </form>
        <!-- Popular searches centered -->
        <div class="text-center mt-3">
            <span class="text-gray-500">Popular Searches:</span>
            <a href="#" class="text-gray-700 ml-2">Jacket</a>
            <a href="#" class="text-gray-700 ml-2">Shirt</a>
            <a href="#" class="text-gray-700 ml-2">Fresh</a>
        </div>
    </div>

    <!-- Close button -->
    <button class="text-gray-500 focus:outline-none">
        <i class="fas fa-times"></i>
    </button>
    </div>
    <div class="border-t-2 border-gray-300 pt-10">
        <?php $product_list = get_products_by_name($_GET['search']); ?>
        <?php foreach ($product_list as $product) { ?>
            <div class="flex -mx-2 justify-center items-center">
                <div class="">
                    <img alt="Placeholder image of a yellow jacket with a black inner lining and a zipper" class="mb-4" src="<?php echo $product['image']; ?>" width="300" height="300" />
                    <div class="font-semibold">
                        <a href="product-detail.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                    </div>
                    <div class="text-gray-700">
                        $<?php echo $product['price']; ?>
                    </div>
                </div>
            <?php } ?>

            </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <?php
    include "inc/footer.php";
    ?>
</body>

</html>
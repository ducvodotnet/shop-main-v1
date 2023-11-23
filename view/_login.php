<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Modal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg relative" style="width: 400px;">
        <h2 class="text-2xl font-semibold mb-6">Great to have you back!</h2>
        <form action="login.php" method="post">
            <i style="color: red;"><?php if(isset( $_SESSION['flash_message'])) echo  $_SESSION['flash_message']; unset( $_SESSION['flash_message']); ?></i>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email *
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email">
                <div class="flex items-center justify-between mt-1">

                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password *
                </label>
                
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="******************">
                <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" style="float: right;">
                    Lost Password?
                </a>
                <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-indigo-600" id="remember">
                        <span class="ml-2 text-sm text-gray-700">Remember</span>
                    </label>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
                    SIGN IN TO YOUR ACCOUNT
                </button>
            </div>
        </form>
        <div class="flex items-center justify-between my-3">
            <hr class="w-full" /> <span class="p-2 text-gray-400 mb-1">Or</span> <hr class="w-full" />
        </div>
        <div class="flex items-center justify-center">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="button">
                <i class="fab fa-facebook-f"></i> Facebook
            </button>
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                <i class="fab fa-google"></i> Google
            </button>
        </div>
        <div class="text-center mt-4">
            <a href="register.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Not a member? <span class="text-teal-500">Create an account</span>
            </a>
        </div>
    </div>
</body>
</html>
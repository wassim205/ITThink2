<?php
require_once "./Controle_System/register.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Create an Account</h2>
        <p class="text-sm text-gray-500 text-center mb-6">Join us by creating your account</p>
        <form method="POST" class="space-y-4" action="SignUp.php">
            <?php if (!empty($errors)): ?>
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">User Name</label>
                <input type="text" id="username" name="username" placeholder="Enter your user name"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button name="register" type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Sign Up</button>
        </form>
        <p class="mt-6 text-center text-sm text-gray-600">Already have an account?
            <a href="Login.php" class="text-blue-600 hover:underline">Log In</a>
        </p>
    </div>
</body>

</html>

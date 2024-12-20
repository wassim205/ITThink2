<?php 
  require_once './Controle_System/logincontroller.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 text-center">Welcome Back</h2>
    <p class="text-sm text-gray-500 text-center mb-6">Please login to your account</p>
    <form action="Login.php" method="POST" class="space-y-4">
    <?php if (!empty($errors)): ?>
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
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

      <button type="submit" name="Login"
        class="w-full py-2 px-4 text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-medium">Login</button>
    </form>
    <p class="mt-6 text-center text-sm text-gray-600">Don't have an account?
      <a href="SignUp.php" class="text-blue-600 hover:underline">Sign up</a>
    </p>
  </div>
</body>

</html>
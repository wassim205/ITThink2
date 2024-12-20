<?php 
require_once './Controle_System/UserController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen">
    <div class="flex h-full">
        <aside class="w-64 bg-blue-600 text-white hidden md:block">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Dashboard</h1>
            </div>
            <nav>
                <ul class="space-y-4 p-4">
                    <li><a href="dashboard.php" class="flex items-center gap-2 text-sm hover:bg-blue-500 p-2 rounded"><span>🏠</span> Home</a></li>
                    <li><a href="users.php" class="flex items-center font-bold gap-2 text-sm hover:bg-blue-500 p-2 rounded"><span>📋</span> Users</a></li>
                    <li><a href="projects.php" class="flex items-center gap-2 text-sm hover:bg-blue-500 p-2 rounded"><span>📁</span> Projects</a></li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-800">Users Overview</h2>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search users..." class="py-1 px-3 border rounded-lg text-sm">
                    <a class="bg-blue-600 text-white py-1 px-3 rounded-lg" href="logout.php">Log Out</a>
                </div>
            </header>

            <main class="p-6 flex-1 overflow-y-auto">
                <div class="bg-white rounded-lg shadow-md">
                    <h3 class="text-lg font-bold p-4">All Users</h3>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 px-4">User Name</th>
                                <th class="py-2 px-4">Email</th>
                                <th class="py-2 px-4">Projects</th>
                                <th class="py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) { ?>
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-2 px-4"><?php echo $user['Full_Name']; ?></td>
                                    <td class="py-2 px-4"><?php echo $user['email']; ?></td>
                                    
                                    <td class="py-2 px-4">
                                        <a href="user_details.php?id=<?php echo $user['Id']; ?>" class="text-blue-600 hover:underline">View</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

<?php 
require_once './Controle_System/UserDashboardController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen">
    <div class="flex h-full">
        <aside class="w-64 bg-blue-600 text-white hidden md:block">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Welcome, <?php echo $username; ?></h1>
            </div>
            <nav>
                <ul class="space-y-4 p-4">
                    <li><a href="./userDashboard.php"
                            class="flex items-center gap-2 text-sm hover:bg-blue-500 p-2 rounded"><span>🏠</span>
                            Dashboard</a></li>
                    <li><a href="#"
                            class="flex items-center gap-2 font-bold text-sm hover:bg-blue-500 p-2 rounded"><span>📁</span>
                            My Projects</a></li>
                    <li><a href="#"
                            class="flex items-center gap-2 text-sm hover:bg-blue-500 p-2 rounded"><span>📋</span>
                            Notifications</a></li>
                    
                </ul>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-800">Your Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..." class="py-1 px-3 border rounded-lg text-sm">
                    <a class="bg-blue-600 text-white py-1 px-3 rounded-lg" href="logout.php">Log Out</a>
                </div>
            </header>

            <main class="p-6 flex-1 overflow-y-auto">

                <div class="mt-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-lg font-bold p-4">Your Projects</h3>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 px-4">Project</th>
                                <th class="py-2 px-4">Status</th>
                                <th class="py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-2 px-4">Portfolio Website</td>
                                <td class="py-2 px-4"><span class="text-green-600">Active</span></td>
                                <td class="py-2 px-4"><a href="#" class="text-blue-600 hover:underline">View</a></td>
                            </tr>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-2 px-4">E-commerce Website</td>
                                <td class="py-2 px-4"><span class="text-yellow-600">In Progress</span></td>
                                <td class="py-2 px-4"><a href="#" class="text-blue-600 hover:underline">View</a></td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4">Blog Website</td>
                                <td class="py-2 px-4"><span class="text-red-600">Pending</span></td>
                                <td class="py-2 px-4"><a href="#" class="text-blue-600 hover:underline">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

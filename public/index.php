<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMP Stack - Setup in Progress</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .status {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            background: #e8f5e8;
            border-left: 4px solid #4caf50;
        }

        .info {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
        }

        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>🚀 LAMP Stack Development Environment</h1>

        <div class="status">
            <strong>✅ Web Server Running!</strong><br>
            Your Apache web server is working correctly.
        </div>

        <div class="status info">
            <strong>⏳ Laravel Setup in Progress</strong><br>
            Laravel is being installed and configured in the background. This page will automatically redirect to your
            Laravel application once setup is complete.
        </div>

        <h2>📋 Environment Info</h2>
        <ul>
            <li><strong>PHP Version:</strong> <?php echo PHP_VERSION; ?></li>
            <li><strong>Web Server:</strong> Apache/PHP</li>
            <li><strong>Database:</strong> MariaDB (available at mariadb:3306)</li>
            <li><strong>phpMyAdmin:</strong> <a href="http://localhost:8080" target="_blank">http://localhost:8080</a>
            </li>
        </ul>

        <h2>🔧 Quick Commands</h2>
        <p>Once Laravel is ready, you can use these commands in the VS Code terminal:</p>
        <ul>
            <li><code>php artisan --version</code> - Check Laravel version</li>
            <li><code>php artisan migrate</code> - Run database migrations</li>
            <li><code>php artisan make:controller UserController</code> - Create a controller</li>
            <li><code>composer install</code> - Install PHP dependencies</li>
            <li><code>npm install</code> - Install Node.js dependencies</li>
        </ul>

        <div class="status info">
            <strong>📖 Documentation:</strong><br>
            Check the <code>README.md</code> and <code>QUICK_START.md</code> files for detailed instructions.
        </div>

        <script>
            // Auto-refresh every 10 seconds to check if Laravel is ready
            setTimeout(function () {
                fetch('/').then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }, 10000);
        </script>
    </div>
</body>

</html>
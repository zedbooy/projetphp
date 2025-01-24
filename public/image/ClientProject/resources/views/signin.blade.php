<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMSI Hub Sign In</title>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .signin-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .signin-container h2 {
            color: #3d9b35;
            margin-bottom: 20px;
        }
        .signin-container form {
            display: flex;
            flex-direction: column;
        }
        .signin-container form input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .signin-container form button {
            padding: 10px;
            background-color: #3d9b35;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .signin-container form button:hover {
            background-color: #307a2a;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button-container button {
            padding: 10px;
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            margin: 0 5px;
        }
        .button-container button.active {
            background-color: #3d9b35;
            color: white;
        }
    </style>
</head>
<body>
    <div class="signin-container">
        <h2>Sign In</h2>
        <form action="signin.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
        </form>
        <div class="button-container">
            <button type="button" class="role-button" data-role="Etudiant">Etudiant</button>
            <button type="button" class="role-button" data-role="Juree">Juree</button>
            <button type="button" class="role-button" data-role="Professeur">Professeur</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.role-button');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    buttons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>

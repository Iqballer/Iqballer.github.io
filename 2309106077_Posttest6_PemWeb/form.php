<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengisian</title>
</head>
<style>
    body{
    background-color: bisque;
}

.kontainer {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 90vh;
}

.kotak {
    background: whitesmoke;
    display: flex;
    flex-direction: column;
    padding: 25px 25px;
    border-radius: 20px;
}

.kotak form {
    width: 450px;
    margin: 0px 10px;
}

.kontainer header {
    font-size: 25px;
    font-weight: 400;
    padding-bottom: 10px;
}

.inputan {
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
}
</style>
<body>
<div class="kontainer">
        <div class="kotak">
            <header>Form Pengisian</header>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $umur = htmlspecialchars($_POST['umur']);
                $password = htmlspecialchars($_POST['password']);
                
                echo "<h3>Selamat Datang:</h3>";
                echo "Username: " . $username . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Umur: " . $umur . "<br>";

                
                echo '<a href="index.html" style="text-decoration:none;">';
                echo '<button type="button">Kembali ke Menu Awal</button>';
                echo '</a>';
            } else {
            ?>
            

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="inputan">
                    <label for="username">Masukan Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="inputan">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="inputan">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" id="umur" required>
                </div>
                <div class="inputan">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
            
            <br>
            <a href="index.html" style="text-decoration:none;">
                <button type="button">Kembali ke Menu Awal</button>
            </a>
            
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>

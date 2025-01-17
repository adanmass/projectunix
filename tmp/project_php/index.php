<?php
$servername = "db"; 
$username = "root"; 
$password = "123"; 
$dbname = "databas"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$definition = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST['word'];

    $sql = "SELECT Definition FROM Words WHERE Word = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $word);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $definition = $row["Definition"];
            }
        } else {
            $definition = "No definition found for the word: " . htmlspecialchars($word);
        }

        $stmt->close();
    } else {
        $definition = "Error preparing the SQL statement.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dictionary</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #2575fc;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        input[type="text"] {
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
        }

        button {
            padding: 0.75rem;
            background-color: #2575fc;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1a5bbf;
        }

        .result {
            margin-top: 1.5rem;
            padding: 1rem;
            background-color: #f1f3f5;
            border-radius: 5px;
            text-align: left;
        }

        .result h2 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #2575fc;
        }

        .result p {
            font-size: 1rem;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Simple Dictionary</h1>
        <form method="post" action="">
            <input type="text" id="word" name="word" placeholder="Enter a word" required>
            <button type="submit">Search</button>
        </form>

        <?php if (isset($definition)) : ?>
            <div class="result">
                <h2>Definition:</h2>
                <p><?php echo htmlspecialchars($definition); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
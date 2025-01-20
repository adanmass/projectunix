<?php
$servername = "db"; 
$username = "root"; 
$password = "123"; 
$dbname = "dictionary"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to the database successfully!<br>";
}

$definition = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST['word']; 

    echo "Searching for word: " . htmlspecialchars($word) . "<br>";

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
        $definition = "Error preparing the SQL statement: " . $conn->error;
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 70%;
            margin-right: 10px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .result h2 {
            color: #333;
        }

        .result p {
            color: #555;
            font-size: 18px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Simple Dictionary test</h1>
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


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
    $word = $_POST['word']; // Fix: Use 'word' instead of 'Word'

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
        /* Your CSS styles here */
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

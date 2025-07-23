<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>User Submission Form</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Enter your name" required><br>
        <input type="email" name="email" placeholder="Enter your email" required><br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);

        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Record inserted successfully.</p>";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Fetch and display data
    echo "<h3>Submitted Users</h3>";
    $result = $conn->query("SELECT * FROM users");
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['name']) . " (" . htmlspecialchars($row['email']) . ")</li>";
        }
        echo "</ul>";
    } else {
        echo "No entries yet.";
    }

    $conn->close();
    ?>
</body>
</html>

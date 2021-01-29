<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Something posted

  if (isset($_POST['submit'])) {
    kurti();
    echo "ikelta sekmyngai";
  } else {
    echo "Ivyko Klaida";
  }
}
function kurti(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "filmai";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //values
    $pavadinimas = $_POST["pavadinimas"];
    $autorius = $_POST["autorius"];
    $aprasymas = $_POST["aprasymas"];
    $trukme = $_POST["trukme"];
    //insertinimas
    $sql = "INSERT INTO visi (pavadinimas, autorius, aprasymas, trukme)
    VALUES ('$pavadinimas', '$autorius', '$aprasymas','$trukme')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
      //CIA ADDDASASASAS
}

function visi(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "filmai";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, pavadinimas, autorius, aprasymas, trukme FROM visi";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo '<div class="card col" style="width: 18rem;">
          <div class="card-header">
          Pavadinimas: '.$row["pavadinimas"].'
          </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Autorius: '.$row["autorius"].'</li>
          <li class="list-group-item">Aprasymas: '.$row["aprasymas"].'</li>
          <li class="list-group-item">Trukmė: '.$row["trukme"].'</li>
        </ul>
      </div>';
     //BAIGIAU CIA READ
      }
    } else {
      echo "0 results";
    }
    $conn->close();
}
?>
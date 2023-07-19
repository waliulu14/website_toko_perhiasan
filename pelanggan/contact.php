<?php
include('nav.php');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "20222_wp2_412021021";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $message = $_POST['messenge'];

  // Insert form data into the "pesan" table
  $insertQuery = "INSERT INTO pesan (nama, email, messenge) VALUES ('$nama', '$email', '$message')";
  $insertResult = mysqli_query($conn, $insertQuery);

  if ($insertResult) {
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data inserted successfully.',
    });
  </script>";
  } else {
    // Display error message using SweetAlert
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Error inserting data: " . mysqli_error($conn) . "',
    });
  </script>";
  }
}
?>

<div class="con-contact">

  <div class="con-contact-1">
    <img
      src="https://cdn.shopify.com/s/files/1/1900/6033/files/gift-habeshaw-1eJJNVbwnls-unsplash_720x.jpg?v=1627482806"
      alt="" height="500px" width="380px" />
    <img
      src="https://cdn.shopify.com/s/files/1/1900/6033/files/jewelers-measuring-tools-on-workbench_720x.jpg?v=1627482379"
      alt="" height="500px" width="380px" />
    <img
      src="https://cdn.shopify.com/s/files/1/1900/6033/files/hands-2705251_1920222_4ab3072c-ae8f-4fae-bc49-efc82b07882e_720x.jpg?v=1627481259"
      alt="" height="500px" width="380px" />
  </div>
</div>

<div class="con-contact-text">
  <div class="con-contact-1-text">
    <div class="DS">
      <h3>Diamond Spesialist</h3>
      <p>
        Our Specialists are avaiable:<br />
        Mon-Sat, 10:00 AM-9:00 PM<br />
        Central Park, Jakarta
      </p>
    </div>

    <div class="HQ">
      <h3>Headquartes</h3>
      <p>
        Office, Showroom, and Workshop all in-house!<br />
        APL Tower num.876, Jakarta
      </p>
    </div>

    <div class="CS">
      <h3>Costumer Service</h3>
      <p>
        Contact us at:<br />
        +02152753<br />
        luxsoze@gmail.com
      </p>
    </div>
  </div>
</div>


<section id="from-details">
  <form action="" method="POST">



    <span>Send Us A Message</span>
    <h2>Let Us Know What You Need</h2>
    <div class="form-group">
      <label for="nama">Name:</label>
      <input type="text" id="nama" name="nama" required>
    </div>
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="konten" class="form-label">Your Messenge</label>
      <textarea class="form-control" id="konten" name="messenge" rows="4" required></textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Submit">
    </div>

  </form>
</section>

<?php
include('footer.php');
?>
<?php
// Menghubungkan dengan database
include 'db_connect.php'; // Pastikan ini adalah nama file koneksi Anda

// Mengambil data portofolio
$sql = "SELECT * FROM portfolio";
$result = $conn->query($sql);

// Mulai tampilan HTML
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Portofolio Aldi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100">
    <!-- Navigation -->
    <?php include 'header.php'; ?> <!-- Menggunakan header yang sudah ada -->
    
    <main class="flex-shrink-0">
        <!-- Page Content -->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Portofolio</h1>
                    <p class="lead fw-normal text-muted mb-0">I enjoy being involved in organizations</p>
                </div>
                <div class="row gx-5">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <div class="col-lg-6">
                                <div class="position-relative mb-5">
                                    <img class="img-fluid rounded-3 mb-3" src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['project_name']; ?>" />
                                    <a class="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!"><?php echo $row['project_name']; ?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No projects found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <?php include 'footer.php'; ?> <!-- Menggunakan footer yang sudah ada -->
    
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>
</html>

<?php
// Menutup koneksi database
$conn->close();
?>

<?php include 'header.php'; ?>

<!-- Header-->
<header class="py-5">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-6">
                <div class="text-center my-5">
                    <?php
                    // Fetching the header mission statement
                    $result = $conn->query("SELECT * FROM pages WHERE page_type = 'header'");
                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<h1 class="fw-bolder mb-3">' . $row['content'] . '</h1>';
                        echo '<p class="lead fw-normal text-muted mb-4">' . $row['title'] . '</p>';
                        echo '<a class="btn btn-primary btn-lg" href="#scroll-target">Read my story</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About sections -->
<?php
// Fetching about sections
$result = $conn->query("SELECT * FROM pages WHERE page_type = 'about'");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<section class="py-5 ' . ($row['id'] == 2 ? 'bg-light' : '') . '">';
        echo '<div class="container px-5 my-5">';
        echo '<div class="row gx-5 align-items-center">';
        echo '<div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="' . $row['image'] . '" alt="..." /></div>';
        echo '<div class="col-lg-6">';
        echo '<h2 class="fw-bolder">' . $row['title'] . '</h2>';
        echo '<p class="lead fw-normal text-muted mb-0">' . $row['content'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
}
?>

<?php include 'footer.php'; ?>

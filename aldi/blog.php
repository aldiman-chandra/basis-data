<?php include 'db_connect.php'; ?>
<?php include 'header.php'; ?>

<main class="flex-shrink-0">
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center mt-lg-5 mb-4">
                        <img class="img-fluid rounded-circle" src="assets/gambar7.jpeg" alt="..." />
                        <div class="ms-3">
                            <div class="fw-bold">aldiman.chandra</div>
                            <div class="text-muted">Athlete</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                            <div class="text-muted fst-italic mb-2">October 19, 2024</div>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Sport</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Taekwondo</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4">
                            <img class="img-fluid rounded" src="assets/gambar6.jpeg" alt="..." />
                        </figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">Next month, I will compete again. Hopefully, I can win again.</p>
                            <h2 class="fw-bolder mb-4 mt-5">My achievements at UPJ</h2>
                            <p class="fs-5 mb-4">One of my biggest achievements so far is receiving a full scholarship to attend Universitas Pembangunan Jaya. It’s something that I’m really proud of because it’s allowed me to focus on my studies without financial worries.</p>
                        </section>
                    </article>
                </div>
            </div>
            <!-- Form to create new blog post -->
            <div class="my-5">
                <h2 class="fw-bolder">Create a New Blog Post</h2>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                <?php
                // Handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $title = $conn->real_escape_string($_POST['title']);
                    $content = $conn->real_escape_string($_POST['content']);
                    $date = date("Y-m-d H:i:s");

                    $sql = "INSERT INTO blog_posts (title, content, created_at) VALUES ('$title', '$content', '$date')";

                    if ($conn->query($sql) === TRUE) {
                        echo '<div class="alert alert-success">Blog post created successfully!</div>';
                    } else {
                        echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>

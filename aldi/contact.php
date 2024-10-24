<?php include 'db_connect.php'; ?>
<?php include 'header.php'; ?>

<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h1 class="fw-bolder">Get in touch</h1>
                    <p class="lead fw-normal text-muted mb-0">081315336286, @aldiman.chandra, alvoiton666@gmail.com</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form id="contactForm" method="POST" action="">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." required />
                                <label for="name">Full name</label>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                                <label for="email">Email address</label>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" required />
                                <label for="phone">Phone number</label>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                                <label for="message">Message</label>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                            </div>
                        </form>

                        <?php
                        // Handle form submission
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $name = $conn->real_escape_string($_POST['name']);
                            $email = $conn->real_escape_string($_POST['email']);
                            $phone = $conn->real_escape_string($_POST['phone']);
                            $message = $conn->real_escape_string($_POST['message']);

                            $sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

                            if ($conn->query($sql) === TRUE) {
                                echo '<div class="alert alert-success mt-3">Message sent successfully!</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-3">Error: ' . $conn->error . '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
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

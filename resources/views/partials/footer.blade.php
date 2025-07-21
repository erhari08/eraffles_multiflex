<!-- Footer -->
<footer class="bg-dark text-light pt-5 pb-4 mt-5 border-top border-secondary shadow-sm">
    <div class="container">
        <div class="row g-4">
            <!-- About -->
            <div class="col-md-4">
                <div class="mb-3">
                    <img src="{{ asset('storage/images/PPC_council_image.png') }}" alt="PPC Logo" style="height: 50px;">
                </div>
                <p class="small mb-2">
                    Pondicherry Pharmacy Council is committed to regulating and advancing pharmacy
                    practice within the Union Territory.
                </p>
                <p class="small mb-1">
                    <i class="fas fa-map-marker-alt me-2 text-warning"></i>Govt Pharmacy Campus
                    Indira Nagar,
                    Gorimedu,
                    Puducherry - 605006.
                </p>
                <p class="small">
                    <i class="fas fa-phone-alt me-2 text-warning"></i>+91-9025589399,+91-9400127205

                    <br>
                    <i class="fas fa-envelope me-2 text-warning"></i> ponphacil@gmail.com
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-2">
                <h6 class="text-uppercase fw-bold mb-3 border-bottom border-secondary pb-1">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li><a href="renewal.php" class="text-light text-decoration-none d-block py-1">Renewal</a>
                    </li>
                    <li><a href="cpe.php" class="text-light text-decoration-none d-block py-1">CPE Portal</a></li>
                    <li><a href="track.php" class="text-light text-decoration-none d-block py-1">Restoration</a>
                    </li>
                    <li><a href="announcements_home.php"
                            class="text-light text-decoration-none d-block py-1">Announcements</a></li>
                    <li><a href="contact.php" class="text-light text-decoration-none d-block py-1">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Online Services -->
            <div class="col-md-3">
                <h6 class="text-uppercase fw-bold mb-3 border-bottom border-secondary pb-1">Online Services</h6>
                <ul class="list-unstyled small">
                    <li><a href="cpe.php" class="text-light text-decoration-none d-block py-1">Transfer
                            Certificate</a></li>
                    <li><a href="duplicate_certificate.php"
                            class="text-light text-decoration-none d-block py-1">Duplicate Certificate</a></li>
                    <li><a href="name_change.php" class="text-light text-decoration-none d-block py-1">Name
                            Change</a></li>
                    <li><a href="track.php" class="text-light text-decoration-none d-block py-1">Track
                            Application</a></li>
                    <li><a href="announcements_home.php"
                            class="text-light text-decoration-none d-block py-1">Announcements</a></li>
                </ul>
            </div>

            <!-- QR Code (Optional Un-comment) -->
            {{-- 
            <div class="col-md-3 text-center text-md-end">
                <h6 class="text-uppercase fw-bold mb-3">Scan & Access</h6>
                <p class="small">Scan the QR code to access our Payments.</p>
                <img src="{{ asset('storage/images/ppcqrcode-small.png') }}" alt="QR Code"
                    class="img-fluid rounded border border-white" style="max-width: 130px;">
            </div> 
            --}}
        </div>

        <hr class="bg-secondary mt-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small">
            <p class="mb-2 mb-md-0">&copy; {{ date('Y') }} Pondicherry Pharmacy Council. All Rights Reserved.
            </p>
            <div>
                <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.querySelector('.card-body');
        let scrollAmount = 0;

        setInterval(() => {
            scrollAmount += 1;
            if (scrollAmount >= container.scrollHeight - container.clientHeight) {
                scrollAmount = 0; // reset to top
            }
            container.scrollTop = scrollAmount;
        }, 100); // Adjust speed (lower = faster)
    });
</script>

</body>

</html>

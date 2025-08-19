    <footer>
        <div class="footer-bot">
            <div class="row">
                <div class="narrow section-intro with-bottom-sep animate-this">
                    <div class="col-twelve">
                        <span>Green Urban</span>
                        <h3>We make Earth a better place</h3>
                    </div>
                </div>
            </div>
        </div>
        <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
            </a>
        </div>
    </footer>

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <script>
        // Contact form validation (client-side)
        function contactValidation() {
            var valid = true;
            $("#name").removeClass("error-field");
            $("#email").removeClass("error-field");
            $("#subject").removeClass("error-field");
            $("#message").removeClass("error-field");

            var Name = $("#name").val();
            var Email = $("#email").val();
            var Subject = $("#subject").val();
            var Message = $("#message").val();

            $("#name-info").html("").hide();
            $("#email-info").html("").hide();
            $("#subject-info").html("").hide();
            $("#message-info").html("").hide();

            if (Name.trim() == "") {
                $("#name-info").html("required.").css("color", "#ee0000").show();
                $("#name").addClass("error-field");
                valid = false;
            }
            if (Email.trim() == "") {
                $("#email-info").html("required.").css("color", "#ee0000").show();
                $("#email").addClass("error-field");
                valid = false;
            }
            if (Subject.trim() == "") {
                $("#subject-info").html("required.").css("color", "#ee0000").show();
                $("#subject").addClass("error-field");
                valid = false;
            }
            if (Message.trim() == "") {
                $("#message-info").html("required.").css("color", "#ee0000").show();
                $("#message").addClass("error-field");
                valid = false;
            }
            if (!valid) {
                $('.error-field').first().focus();
            }
            return valid;
        }

        // AJAX submission
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();
                if (!contactValidation()) return;

                $.ajax({
                    url: 'index.php?route=contact/submit',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            $('#contact-form')[0].reset();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Menu toggle logic
            $('#header-menu-trigger').click(function(e) {
                e.preventDefault();
                $('#menu-nav-wrap').toggleClass('menu-open');
            });

            $('.close-button, .nav-list a').click(function(e) {
                if ($(window).width() < 768) {
                    e.preventDefault();
                    $('#menu-nav-wrap').removeClass('menu-open');
                }
            });
        });
    </script>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
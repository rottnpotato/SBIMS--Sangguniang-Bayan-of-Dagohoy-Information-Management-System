<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primaryy-color: rgba(30, 58, 138, 0.9); /* Slightly transparent dark blue */
            --secondaryy-color: #34d399;
            --text-colorr: #ffffff;
            --background-colorr: #f0f9ff;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .footer {
            background-image: url("{{ URL::asset('images/dagohoy.jpg') }}"); /* Replace with actual image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: var(--text-colorr);
            padding: 40px 0 20px;
            position: relative;
        }
        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--primaryy-color);
            z-index: 1;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .footer-section {
            flex: 1;
            margin-bottom: 20px;
            min-width: 200px;
        }
        .footer-section h5 {
            color: var(--secondaryy-color);
            font-size: 1.2em;
            margin-bottom: 15px;
        }
        .footer-section p {
            line-height: 1.6;
        }
        .social-icons a {
            color: white;
            font-size: 1.5em;
            margin-right: 15px;
            transition: color 0.3s ease;
        }
        .social-icons a:hover {
            color: var(--secondaryy-color);
        }
        .quick-links {
            list-style-type: none;
            padding: 0;
        }
        .quick-links li {
            margin-bottom: 10px;
        }
        .quick-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .quick-links a:hover {
            color: var(--secondaryy-color);
        }
        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
            }
            .footer-section {
                margin-bottom: 30px;
            }
        }
    </style>
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h5>Contact Us</h5>
                    <p>Sangguniang Bayan Building<br>Dagohoy, Bohol, Philippines<br>Phone: +63 38 XXX XXXX<br>Email: sanggunian_dagohoy@bohol.gov.ph</p>
                </div>
                <div class="footer-section">
                    
                </div>
                <div class="footer-section">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Sangguniang Bayan of Dagohoy, Bohol. All rights reserved.</p>
            </div>
        </div>
    </footer>
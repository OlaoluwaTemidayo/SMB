<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luxiliari";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO luxiliari_contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo '<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: \'Playfair Display\', serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #fff5e6 0%, #fff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .success-container {
            text-align: center;
            max-width: 600px;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(139, 69, 19, 0.1);
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            width: 120px;
            height: 120px;
            margin-bottom: 2rem;
        }

        .success-title {
            font-size: 2.5rem;
            color: #2c1810;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .success-message {
            font-size: 1.2rem;
            color: #8b4513;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .return-button {
            padding: 1rem 2.5rem;
            background: linear-gradient(45deg, #2c1810, #8b4513);
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .return-button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
        }

        .checkmark-circle {
            animation: circleScale 0.5s ease-in-out 0.2s both;
        }

        .checkmark-path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawCheck 1s ease-in-out forwards;
        }

        @keyframes circleScale {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        @keyframes drawCheck {
            to {
                stroke-dashoffset: 0;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="success-container">
            <svg class="success-icon" viewBox="0 0 120 120">
                <circle class="checkmark-circle" cx="60" cy="60" r="54" 
                        fill="none" stroke="#8b4513" stroke-width="4"/>
                <path class="checkmark-path" d="M30 60 L52 82 L90 44" 
                      fill="none" stroke="#2c1810" stroke-width="6" 
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h1 class="success-title">Message Sent Successfully!</h1>
            <p class="success-message">
                Thank you for reaching out to Luxliary. We\'ve received your message and will get back to you shortly.
            </p>
            <a href="index.html" class="return-button">Return to Home</a>
        </div>
        <script>
            // Add ripple effect to button
            document.querySelector(\'.return-button\').addEventListener(\'mouseenter\', function(e) {
                this.style.transform = \'scale(1.05)\';
            });
            
            document.querySelector(\'.return-button\').addEventListener(\'mouseleave\', function(e) {
                this.style.transform = \'scale(1)\';
            });
        </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

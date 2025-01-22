<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online MTSN 1 Tangerang</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Roboto', sans-serif;
            background: url('/storage/backgroundpage.jpeg') no-repeat center center fixed;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .container {
            text-align: center;
            max-width: 90%;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for contrast */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo {
            width: 200px;
            max-width: 100%;
            margin-bottom: 20px;
            transition: transform 0.3s ease; /* Logo hover effect */
        }

        .logo:hover {
            transform: scale(1.1); /* Slightly enlarge logo on hover */
        }

        .logo-text {
            font-size: 1.2rem;
            color: #fff;
            font-weight: 500;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.1rem;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow on button */
            text-decoration: none; /* Menghilangkan garis bawah pada teks */

        }

        .button-left {
            background-color: #3498db;
        }

        .button-left:hover {
            background-color: #2980b9;
            transform: translateY(-5px); /* Subtle lift on hover */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .button-right {
            background-color: #e74c3c;
        }

        .button-right:hover {
            background-color: #c0392b;
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design for smaller screens */
        @media (max-width: 600px) {
            .buttons {
                flex-direction: column;
                gap: 15px;
            }
            .button {
                width: 100%;
                padding: 20px;
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="/storage/logo.png" alt="Logo" class="logo">
        <div class="logo-text">PPDB Online MTS 1 Negeri Tangerang</div>
        <div class="buttons">
            <a href="/admin/register" class="button button-left">Daftar</a>
            <a href="/admin/login" class="button button-right">Masuk</a>
        </div>
    </div>
</body>
</html>

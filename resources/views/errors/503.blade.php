<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PT. Sindo Prima Niaga - Website Dalam Pemeliharaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            background: url('{{ asset("assets/web/images/maintenance.jpg") }}') no-repeat center center/cover;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.6);
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .container {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            padding: 0 5%;
        }

        .left {
            max-width: 45%;
        }

        .left h1 {
            font-size: 50px;
            margin-bottom: 10px;
        }

        .left p {
            font-size: 18px;
            color: #ccc;
        }

        .right {
            text-align: center;
        }

        .countdown {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .countdown div {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 5px;
        }

        .countdown span {
            display: block;
            font-size: 28px;
            font-weight: bold;
        }

        .form-box {
            margin-bottom: 20px;
        }

        input[type="email"] {
            padding: 10px;
            width: 250px;
            border: none;
            border-radius: 5px 0 0 5px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 0 5px 5px 0;
            background-color: #ff5722;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .social-icons a {
            margin: 0 8px;
            color: white;
            font-size: 20px;
            text-decoration: none;
        }

        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: #aaa;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="left">
            <img src="{{ asset('assets/cms/img/white-logo-text.png') }}" alt="Logo" width="100px" />
            <h1>WEBSITE UNDER MAINTENANCE</h1>
            <p>Our website is under maintenance. We'll be here soon with our new awesome site.</p>
        </div>
    </div>

    <footer>
        www.spniaga.co.id
    </footer>

</body>
</html>

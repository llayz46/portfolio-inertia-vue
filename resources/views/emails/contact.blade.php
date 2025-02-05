<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            color: #555555;
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .label {
            font-weight: bold;
            color: #333333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Nouveau message de : {{ $data['name'] }}</h1>

    <p><span class="label">Nom :</span> {{ $data['name'] }}</p>
    <p><span class="label">Email :</span> {{ $data['email'] }}</p>
    <p><span class="label">Message :</span></p>
    <p>{{ $data['message'] }}</p>
</div>
</body>
</html>

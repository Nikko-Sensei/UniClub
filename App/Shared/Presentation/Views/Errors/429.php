<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>
        Too Many Requests
    </title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f8fafc;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    error-box {

        background: white;
        padding: 40px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .1);

    }

    h1 {

        font-size: 50px;
        color: #dc2626;

    }

    p {

        color: #64748b;

    }
    </style>

</head>

<body>

    <div class="error-box">

        <h1>
            429
        </h1>

        <h2>
            Too Many Requests
        </h2>

        <p>
            <?= htmlspecialchars($message ?? 'Please try again later.') ?>
        </p>

    </div>

</body>

</html>
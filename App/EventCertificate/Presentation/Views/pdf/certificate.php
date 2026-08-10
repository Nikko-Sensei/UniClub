<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <style>
    body {

        font-family: DejaVu Sans;

        text-align: center;

        padding-top: 120px;

    }

    h1 {

        font-size: 40px;

    }

    h2 {

        font-size: 28px;

    }

    p {

        font-size: 18px;

    }

    .number {

        margin-top: 40px;

        font-size: 14px;

        color: #666;

    }
    </style>

</head>

<body>

    <h1>
        University Club Management System
    </h1>

    <h2>
        Certificate of Participation
    </h2>

    <p>

        This certificate is awarded to

    </p>

    <h2>

        <?= htmlspecialchars($studentName) ?>

    </h2>

    <p>

        for participating in

    </p>

    <h2>

        <?= htmlspecialchars($eventTitle) ?>

    </h2>

    <p>

        Date

        <br>

        <?= htmlspecialchars($eventDate) ?>

    </p>

    <p class="number">

        Certificate No:

        <?= htmlspecialchars($certificateNumber) ?>

    </p>

</body>

</html>
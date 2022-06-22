<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .content {
            margin-top: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <h1>Paypal payment method for crm</h1>

        <form action="{{ url('charge') }}" method="post">
            <input type="text" name="amount" />
            {{ csrf_field() }}
            <input type="submit" name="submit" value="Pay Now">
        </form>
    </div>
</div>
</body>
</html>

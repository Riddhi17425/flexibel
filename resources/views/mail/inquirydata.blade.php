<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <h2>Inquiry </h2>
    <P>Name : {{$inquiryquote['name']}}</P>
    <P>Email : {{$inquiryquote['email']}}</P>
    <P>Phone : {{$inquiryquote['phone']}}</P>
    <P>Product Type : {{$inquiryquote['product_type']}}</P>
    <P>Message : {{$inquiryquote['message']}}</P>
</body>

</html>
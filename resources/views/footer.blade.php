<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .footer {
            background-color: #008d36;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .footer img {
            vertical-align: middle;
            margin-right: 10px;
        }
        .footer span {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="footer">
        <img src="{{ asset('image/emsihubwhite.png') }}" alt="EMSI Hub" height="30">
        <span>&copy; {{ date('Y') }} </span>
    </div>
</body>
</html>
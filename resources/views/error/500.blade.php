<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>505 Page - VigoOs</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::to('assets/css/error/500.css') }}">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="center">
        <div class="error">
            <div class="number">5</div>
            <div class="illustration">
                <div class="circle"></div>
                <div class="clip">
                    <div class="paper">
                        <div class="face">
                            <div class="eyes">
                                <div class="eye eye-left"></div>
                                <div class="eye eye-right"></div>
                            </div>
                            <div class="rosyCheeks rosyCheeks-left"></div>
                            <div class="rosyCheeks rosyCheeks-right"></div>
                            <div class="mouth"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="number">5</div>
        </div>

        <div class="text">Ada kesalahan pada webserver sistem anda.</div>
        <a class="button" href="{{ route('dashboard') }}">Back to Dashboard</a>

        <footer style="">
            <center>
                <p>&copy;Copyright <strong><span>VigoOS</span></strong>. All Rights Reserved</p>
            </center>
        </footer>
    </div>
</body>

</html>

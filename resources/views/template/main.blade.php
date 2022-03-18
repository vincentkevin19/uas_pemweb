<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/storage/facility-images/default.jpg" type="image/gif">
    <title>NewsPortalUmn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group = "file-tools"]{
          display: none;
        }
        body{
        background: linear-gradient(180deg, #2EB2E2 0%, #FFFFFF 100%);
        background-repeat: repeat;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        .card{
            border-radius: 17px;
                background: #a1e2e2;
                box-shadow:  7px 7px 10px #87bebe,
                            -7px -7px 10px #bbffff;
        }
    </style>
</head>
<body>
    @include('navbar.navbar')

    @yield('container')

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Not Found</title>

        <link href="https://fonts.googleapis.com/css?family=Cabin|Dosis" rel="stylesheet">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #30a2e9;
                display: table;
                font-weight: 100;
                font-family: 'Cabin';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 60px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
              <div class="title">
                Halaman Tidak Ditemukan!
              </div>
              <img src="{{ asset('client/img/logo/logo.png') }}" width="200px" class="logo">
            </div>
        </div>
    </body>
</html>

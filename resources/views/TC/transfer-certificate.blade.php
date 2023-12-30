<!doctype html>
<html lang="en">

<head>
    <title>Transfer Certificate</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0 auto;
        }





        .cert-container {
            margin: 0px 0 0px 0;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .cert {
            width: 800px;
            height: 600px;
            padding: 15px 20px;
            text-align: center;
            position: relative;
            z-index: -1;
        }

        .cert-bg {
            position: absolute;
            left: 0px;
            top: 0;
            z-index: -1;
            width: 100%;
        }

        .cert-content {
            width: 750px;
            height: 470px;
            padding: 70px 60px 0px 60px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;

        }

        h1 {
            font-size: 44px;
        }

        p {
            font-size: 25px;
        }

        small {
            font-size: 14px;
            line-height: 12px;
        }

        .bottom-txt {
            padding: 12px 5px;
            display: flex !important;
            justify-content: space-between !important;
            align-items: center;
            font-size: 16px;
            width: 100% !important;
        }

        .bottom-txt p {
            width: 20% !important;
            font-size: 16px;
            margin: 0;
        }

        .other-font {
            font-family: Cambria, Georgia, serif;
            font-style: italic;
        }

        .ml-215 {
            margin-left: 215px;
        }
    </style>

</head>

<body>


    <div class="cert-container">
        <div id="content2" class="cert">
            <img src="{{ public_path('/') }}/tc/certificate.png" class="cert-bg" alt="" />
            <div class="cert-content">
                <div style="text-align: center:margin-left:-20px !important;">

                    <h1 class="other-font" style="margin-bottom:60px ">Transfer Certificate</h1>
                    <p style="font-size: 30px;margin:0">{{ $name }}</p>
                    <span class="other-font " style="margin-bottom: 20px"><i><b>has approve for the Transfer Certificate</b></i></span>
                    <br />
                    <div style="margin-bottom: 40px">
                        <p style="font-size: 25px;margin-top:40px;margin-bottom:0"><b>Azimuth Check</b></p>
                        <p style="font-size: 10px;margin:0">(Principal)</p>
                        <img height="40" src="{{ public_path('/') }}/tc/signature.png" alt="">
                    </div>

                    <p style="width: 70%;font-size:13px">
                        Upon receiving the transfer certificate, the student officially concludes their academic journey at our institution. We extend our heartfelt wishes for their future endeavors. May their new educational chapter be filled with success and meaningful experiences.</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

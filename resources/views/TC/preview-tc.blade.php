<!doctype html>
<html lang="en">
  <head>
    <title>Transfer Certificate</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
  </head>
  <body>
    <style>
      .wrapper{
        width: 50%;
        margin: 0 auto;
        border: 1px dashed #cccccc;
        padding: 10px;
      }
      .main{
        padding: 10px;
        border: 1px solid #000000;
      }
      p{
        margin-bottom: 0;
      }
    </style>
    <div class="wrapper">
      <div class="main">
        <p>Date: {{ $date }}  </p>
        <p>To</p>
        <p>The Principal</p>
        <p>Natun Kuri Kinder Garten & School</p>
        <p>Sapmari,Sherpur</p>
        <br>
        <p>Subject: Application for Transfer Certificate.</p>
        <br>
        <p>Dear Sir,</p>
        <p>With due respect, I am writing this application to inform you that I am <strong>{{ $student->name }}</strong> one of your school students. I am studying in Class <strong>{{ $student->class }}</strong> of Section <strong>{{ $student->section }}</strong> having class roll number <strong>{{ $student->roll }}</strong> and I have passed previous class final examination with a good percentage of mark. <strong>{{ $tc->reason }}</strong>. And now for further studies, I have to get admission into another School and for that reason, there is a need for Transfer Certificate.</p>
        <p>Therefore I request you to please grant permission for Transfer Certificate as soon as possible. For this kind of help, I shall remain grateful to you.</p>
        <br>
        <p>Your Sincerely,</p>
        <p>Name: <strong>{{ $student->name }}</strong></p>
        <p>Roll: <strong>{{ $student->roll }}</strong></p>
        <p>Class: <strong>{{ $student->class }}</strong></p>
        <p>Section: <strong>{{ $student->section }}</strong></p>
        <p>Shift: <strong>{{ $student->shift }}</strong></p>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
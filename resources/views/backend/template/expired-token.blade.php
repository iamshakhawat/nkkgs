<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Error</title>
                    <style>
                        .center{
                            height: 100vh;
                            text-align: center;
                            display: block;
                        }
                    </style>
                </head>
                <body>
                    <div class="center">
                        <h2>This link is Expired.</h2>
                        <p>Try again to reset your password</p>
                        <a href="{{ route('admin.forget.password') }}">Reset Again</a>
                    </div>
                </body>
                </html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>
        <script src="assets/jquery/jquery-1.11.2.min.js"></script>
        <script>
            $(function(){
                $('#salir').on('click',function(){
                    window.location.href = 'login';
                });
                
            });
        </script>
    </head>
    <body>

        <div id="container">
            <h1>Dashboard</h1>

            <div id="body">

                bienvenido
                <?php
                        echo '<br>Bienvenido '.$user;
                ?>
            </div>
            <div>
                <p><button type="button" id="salir">Salir</button></p>
            </div>
        </div>

    </body>
</html>
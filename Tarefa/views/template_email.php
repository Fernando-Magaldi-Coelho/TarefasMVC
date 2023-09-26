<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar email</title>
</head>
<body>

<form action="envio.php" method="POST">
    <div>
        <input type="text" name="nome" placeholder="nome">
    </div>

    <div>
        <input type="text" name="email_destinatario" placeholder="Email">
    </div>
    
    <div>
        <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
    </div>
    
    <input type="submit" name="enviar">
</form>

</body>
</html>

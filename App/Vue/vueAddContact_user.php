<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <form action="" method="post">
        <label for="name_contact_user">Nom:</label>
        <input type="text" name="name_contact_user">
        <label for="first_name_contact_user">Prenom:</label>
        <input type="text" name="first_name_contact_user">
        <label for="mail_contact_user">Mail:</label>
        <input type="email" name="mail_contact_user">
        <label for="message_contact_user">Votre message:</label>
        <textarea name="message_contact_user"></textarea>
        <input type="submit" value="Ajouter" name="submit">
        <div><?=$error?></div>
    </form>
</body>
</html>
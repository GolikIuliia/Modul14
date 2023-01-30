<html>
    <head>
        <title>Логин</title>
        <link rel="stylesheet" href="spa.css">
     
    </head>
   <body>
        <form action="process.php?act=auth" method="post">
            <input name="login" type="text" placeholder="Логин">
            <input name="password" type="password" placeholder="Пароль">
            <button name="act" type="submit" value="auth">Войти</button>
            
        </form>
        <form method="post" action="process.php?act=register" name="signup-form">
            <div class="form-element">
                <label>Логин</label>
                <input type="text" name="login" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="form-element">
                <label>Пароль</label>
                <input type="password" name="password" required />
            </div>
            <div class="form-element">
                <label>Дата рождения</label>
                <input type="date" name="date" required />
            </div>
                <button type="submit" name="act" value="register">Регистрация</button>
        </form>
            
    </body>
</html>
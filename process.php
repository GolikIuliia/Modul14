<?php
$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;
$date = $_POST['data'] ?? null;
$act = $_POST['act']  ?? false;
echo $act;
// // зададим книгу логинов и паролей 
// $users = [
//      'admin' => ['id' => '1', 'password' => '132432', 'data' => '16.11.2004'],
//      'Olya' => ['id' => '2', 'password' => '888888', 'data' => '15.10.1986'],
//      'Anna' => ['id' => '3', 'password' => '7654321', 'data' => '28.26.1982'],
// ];

function getUsersList() {
    $filename = 'users.json';
    $file = file_get_contents($filename);
    $data = json_decode($file, true);
    echo $data;
    return $data;
    
}

function addUsersList($login, $password, $date) {
    $password = hash('sha256', $password);
    $filename = 'users.json';
    if (file_exists($filename)) {
        $file = file_get_contents($filename);
        $data = json_decode($file, true);
        foreach ($data as $key => $value) {           
            $lastid = $value['id'];
        }
        $data[$login] = array('id' => $lastid + 1, 'password' => $password, 'date' => $date);
            print_r($data);  
            $data = json_encode($data);
            file_put_contents($filename, $data);      
    } else {
        $file = fopen($filename, "a+");
    }
}

//addUsersList('Iu', '764', '27.05.1982');

function existsUser($login) {  //существует ли пароль с указанным логином
    $data = getUsersList();
    //print_r($data[$login]);
    if (is_array($data[$login])) {
        return true;
    } else return false;
}
//existsUser('Iu');

function checkPassword($login, $password) {
    $data = getUsersList();
    $sr = existsUser($login);
    print_r($data[$login]['password']);
    print_r($sr);
    $password = hash('sha256', $password);
    if ($sr  && $password == hash_equals($password, $data[$login]['password'])) { //то, что извлекаю из ячейки пользлвателя
        echo $login;
        return true;
    } return false;

}checkPassword('Iu', '764');


function getCurrentUser() {
    return $_POST['login'] ||  null;
    //$username = $_POST['login'] ?? null;
}
// echo 'Привет, пользователь ' . getCurrentUser() . '!';

if (null !== $username || null !== $password) {
    
    // Существует ли пользователь с заданным логином и правильно ли ввежён пароль
    
    if (existsUser($username) && checkPassword($username, $password)) {
        echo 'Привет, пользователь ' . getCurrentUser() . '!';
         // Стартуем сессию:
        session_start(); 
        
   	 // Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true; 
        
        // Пишем в сессию логин и id пользователя
        $_SESSION['id'] = $users['admin']['id']; 
        $_SESSION['login'] = $username; 

    }
}
   
$auth = $_SESSION['auth'] ?? null;

// если авторизованы
//if ($auth) {
// ?>
 <!-- контент для администратора
    <a href="index.php">Вернуться на главную</a> -->

<?php 
//<?php
//ession_start();

$auth = $_SESSION['auth'] ?? null;

if(!$auth) { ?>
  <html>
  <body>
      <form action="login.php" method="post">
          <input name="login" type="text" placeholder="Логин">
          <input name="password" type="password" placeholder="Пароль">
          <input name="submit" type="submit" value="Войти">
      </form>
  </body>
  </html>
<?php }
?>
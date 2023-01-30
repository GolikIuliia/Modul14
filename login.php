<html>
<head>
        <title>Спа салон Личная</title>
        <link rel="stylesheet" href="spa.css">
        <script>  
        function timer(){   
        // вызываем встроенную функцию, которая поможет нам получить данные с сервера
        $.ajax({   
            // какой скрипт серверу нужно выполнить
            url: "timer.php",   
            // предыдущие ответы не сохраняем
            cache: false,   
            // если всё хорошо, отправляем ответ от сервера на страницу в блок content
            success: function(html){   
                $("#content").html(html);   
            }   
        });   
    } 
            // как только страница полностью загрузилась
        $(document).ready(function(){
            // начинаем каждую секунду запрашивать новые данные для отсчёта
            timer();   
            setInterval('timer()',1000);   
        });
        </script>
    </head>
   <body>
        <form action="process.php" method="post">
            <input name="login" type="text" placeholder="Логин">
            <input name="password" type="password" placeholder="Пароль">
            <button name="act"type="submit" value="auth">Войти</button>
            
        </form>
        <form method="post" action="process.php" name="signup-form">
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
        <main>
            <section class="servis">          
                <article>
                    <a href="https://7kpacok.ru/spa-uslugi/tajskaya-skazka-2-chasa/">                                   
                        <h2>Тайская сказка 2 часа. Ваша персональная скидка 5%
                            
                            <div id="content"></div>
                            <?php
                            
                            $datetime3 = new DateTime(date("H:i:s"));//Получаем текущее время
                            $datetime4 = new DateTime('23:59:59');//Время, до которого действует акция

                            $interval2 = $datetime3->diff($datetime4); // И считаем разницу для времени
                            echo $interval2->format('До конца акции осталось: %h ч. %i мин. %s сек.');
                            ?>
                           
                        </h2>                
                    </a>            
                    <img src="SPA/Тайская сказка.jpg">
                    <button>Подробнее</button>
                </article>
            </section>    
            <section class="servis">
                <article>   
                    <h2>ЭФФЕКТИВНОСТЬ ТРАДИЦИОННЫХ СПА-ПРОЦЕДУР</h2>
                    <li>Вывод токсинов из организма и ускорение метаболизма.</li>
                    <li>Нормализация дыхания, кровообращения, состояния сосудов.</li>
                    <li>Увеличение упругости мышц и восстановление эластичности кожи.</li>
                    <li>Избавление от хронической усталости, утомляемости и нарушений сна</li>
                    <li>Снятие нервного напряжения, повышение стрессоустойчивости и улучшение настроения.</li>
                </article>
            </section>                
        </main>    
    </body>
</html>
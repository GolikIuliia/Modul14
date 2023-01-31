<html>
<head>
        <title>Личная</title>
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
        <main>
            
            <form action="index1.php" target="_blank">                    
                    <button>Выйти</button>
                        <h1>Добро пожаловать!</h1>
            </form>
            <section class="servis">          
                <article>
                    <a href="https://7kpacok.ru/share/ne-povyshaem-tseny/">                                   
                        <h2>Подарок ко дню рождения. В день рождения Ваша персональная скидка 5%
                            
                            <div id="content"></div>
                            <?php

                            $datetime1 = new DateTime(date("Ymd")); //Получаем текущую дату
                            $datetime2 = new DateTime('20231116'); //Дата акции $date;
                            
                            $datetime3 = new DateTime(date("H:i:s"));//Получаем текущее время
                            $datetime4 = new DateTime('23:59:59');//Время, до которого действует акция

                            $interval1 = $datetime1->diff($datetime2);// Считаем разницу для года, месяца и дня
                            $interval2 = $datetime3->diff($datetime4); // И считаем разницу для времени
                            
                            echo $interval1->format('До конца акции осталось: %m мес. %d д.'); // отправляем результаты обратно
                            echo $interval2->format('До конца акции осталось: %h ч. %i мин. %s сек.');
                            
                            ?>                           
                        </h2>                
                    </a>            
                    <img src="spa2.jfif">
                    <button>Подробнее</button>
                </article>
            </section>  
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
                            <img src="Тайская сказка.jpg">
                        <button>Подробнее</button>
                    </article>               
            </section>                          
        </main>    
    </body>
</html>

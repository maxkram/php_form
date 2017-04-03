<?php
    
    $error = ""; $successMessage = "";

    if($_POST){

        
        if (!$_POST["email"]) {
            $error .= "Про email запамятовали<br>";
        }
        if (!$_POST["content"]) {
            $error .= "Тема сочинения не раскрыта<br>";
        }
        if (!$_POST["subject"]) {
            $error .= "А заголовок?<br>";
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
 
          $error .= "Что-то не так с адресом?<br>";
        }
        
        if ($error != "") {
            $error = '<div class="alert alert-danger" role="alert"><p><strong>Ошибка в форме</strong></p>' . $error . '</div>';
        } else {
            $emailTo = "dimon@mail.ru";
            $subject = $_POST("subject");
            $content = $_POST('content');
            $headers = "От " .$_POST('email');
            if (mail($emailTo,$subject,$content,$headers)) {
                $successMessage = '<div class="alert alert-success" role="alert">Ваше сообщение ушло, черные вертолеты уже вылетели за Вами</div>';
            }else{
                 $error = '<div class="alert alert-danger" role="alert"><p><strong>Сообщение не удалось отправить, пробуем еще?</div>';
            }
        }
    }
        
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
   
       <div class="container">
       
    <h1>На связи!</h1>
    
    <div id="error"><? echo $error.$successMessage; ?></div>
        
    <form method="post">
      <div class="form-group">
        <label for="email">Ваш адрес</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Оставьте Ваш email">
        <small id="emailHelp" class="form-text text-muted">Ваш email останется нашей тайной. Честно - никому!.</small>
      </div>
      <div class="form-group">
        <label for="subject">О чем будем писать?</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Есть ли жизнь на Марсе?">
      </div>

      <div class="form-group">
        <label for="content">Расскроем тему подробнее?</label>
        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
      </div>

      <button type="submit" id="submit" class="btn btn-primary">Отправить</button>
    </form>
        
        </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
         
        $("form").submit(function (e) {

            
            var error = "";

            if ($("#email").val()==""){
                error+="Как насчет email?<br>";
                }            
            
            if ($("#subject").val()==""){
                error+="Как насчет темы сообщения?<br>";
                }
            
            if ($("#content").val()==""){
                error+="Да и заявленную тему раскрыть не помешало б";
                }
            
            if (error != "") {
                $("#error").html('<div class="alert alert-danger"role="alert"><p><strong>Ой-ей-ей. Ошиблись, батенька!</strong></p>'+error+'</div>');
                return false;
            } else {
                return true;
            }
        });
 
    </script>
    
  </body>
</html>
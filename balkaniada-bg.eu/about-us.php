<?php 
$title='БАЛКАНИАДА - Как да поръчате продукти';
$description = 'Направете поръчка на избраните от вас продукти';
include '_parts/header.php';
$alert='';
if (isset($_POST['sendEmail']) && (int) $_POST['human'] == $_SESSION['security_code']) {
//
    $msg = '';
    $msg .= "Име: " . $_POST['name'] . "\n";
    $msg .= "Имейл: " . $_POST['email'] . "\n";
    $msg .= "Адрес: \n" . $_POST['address'] . "\n";
	$msg .= "Телефон: \n" . $_POST['telefon'] . "\n";
	$msg .= "Съобщение: \n" . $_POST['message'] . "\n";
    $result = mail("info@balkaniada-bg.eu", "Съобщение от сайта!", $msg, $_POST['email']);
	$msg_sended = "Благодарим за Вашата поръчка!\n\n

След като бъде обработена ще получите имейл с потвърждение и очакваната дата за доставка.
\n\n
Поздрави,\n
Екипът на Балканиада!
";
	mail($_POST['email'], "Благодарим за Вашата поръчка! ", $msg_sended);
    if ($result == true) {
        $alert = 'Съобщението е изпратено успешно!';
    } else {
        $alert = 'Проблем с изпращането! Моля свържете се с нас по телефона.';
    }
    //header('Location: about-us.php');
    //balkaniada123 - PAROLA NA GMAIL
}
 ?>

<div class="container">
    <h1>Как да поръчам?</h1>
    <hr>
    <b style="font-size:17px;">Минималната поръчка е <span class="glyphicon glyphicon-euro"></span>50</b>
	    <?php if ($alert !=null) { ?>
        <div class="alert alert-danger"><?= $alert ?></div>
    <?php } ?>
    <div>
    
        <div class="row">
            <div class="col-sm-6">
               <p class="pull-right" style="text-align: left;">
            Поръчката си можете да направите от формата по-долу. След като въведете своите имена, имейл адрес, адрес за доставка и телефонен номер, в графата "Съобщение" запишете кода или името на избраните от Вас продукти и съответното количество. След обработка на поръчката Ви ще получите имейл с потвърждение и очакваната дата за доставка. <br>
За нас основна цел е да бъдем коректни в изпълнението на поръчките ви и разчитаме на коректност от страна и на вас - нашите клиенти. 
        </p>
                   <form class="form-horizontal" role="form" method="post" action="">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Име</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Имейл</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
                </div>
            </div>
			            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Адрес</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Вашият адрес" value="">
                </div>
            </div>
			            <div class="form-group">
                <label for="telefon" class="col-sm-2 control-label">Телефон</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Телефон" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Съобщение</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" name="message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-10">
                    <label for="human" class="control-label">Въведете кода от изображението</label>
                    <div style="margin-bottom:5px;"><img src="captcha.php"></div>
                    <input type="text" class="form-control" id="human" name="human" placeholder="Въведи кода тук">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input id="submit" name="sendEmail" type="submit" value="Изпрати" class="btn btn-primary">
                </div>
            </div>
        </form>
            </div>
            <div class="col-sm-6">
			        
            </div>
        </div>
    </div>
</div>
<?php include '_parts/footer.php'; ?>
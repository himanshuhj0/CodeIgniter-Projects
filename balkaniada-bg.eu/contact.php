<?php
$title='БАЛКАНИАДА - Контакти';
$description = 'Не се колебайте да се свържете с нас ';
include '_parts/header.php';
?>

<div class="container">
    <h1>Контакти</h1>
    <hr>
    <div class="col-sm-6">
        <p class="contacts"><b>Адрес:</b>  с.Панчарево <br>
            ул.Риляник 49<br>
            <b>Пощенски код:</b> 1137<br>
            <b>Тел:</b> +359 899 331 337<br>
            <b style="visibility:hidden;">Тел:</b> +359 878 279 778</p>
    </div>
    <div class="col-sm-6">
		    <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
			    <div class="fb-page pull-right" data-href="https://www.facebook.com/&#x411;&#x430;&#x43b;&#x43a;&#x430;&#x43d;&#x438;&#x430;&#x434;&#x430;-1154209847932365" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
 
    </div>
</div>
<?php include '_parts/footer.php'; ?>
<footer>
    <div class="container">
        <ul class="pull-left">
            <li><a href="<?= base_url() ?>">Начало</a></li>
            <li><a href="<?= base_url('Събития_16#view_article') ?>">Събития</a></li>
            <li><a href="<?= base_url('Тийм_Билдинг_програми_18#view_article') ?>">Тийм Билдинг</a></li>
            <li><a href="<?= base_url('контакти#contacts') ?>" class="noborder">Контакти</a></li>
        </ul>
        <div class="pull-right">
            Powered by <a href="http://eccfze.ae">ECCFZE</a><!-- @Author: Kiril Kirkov  - https://github.com/kirilkirkov -->
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script>
    if ($(".slide").length > 1) {
        function nextSlide() {
            var next = $(".slide-change.active").next().attr('data-slide');
            if (typeof next === 'undefined') {
                next = 'slide-1';
            }
            $(".slide-change").removeClass('active');
            $('[data-slide="' + next + '"]').addClass('active');

            $("#slider .slide").hide();
            $("#" + next).show();
        }

        var interv = setInterval(function () {
            nextSlide();
        }, 3000);
    } else {
        $("#slide-nav").hide();
    }
    $(".slide-change").click(function () {
        $("#slider .slide").hide();
        var show_slide = $(this).attr('data-slide');
        $(".slide-change").removeClass('active');
        $(this).addClass('active');
        $("#" + show_slide).show();
        clearInterval(interv);
    });
</script>
</body>
</html>
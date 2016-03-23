</div>
</div>
</div>
</div>
<?php if ($this->session->userdata('logged_in')) { ?>
    <footer>Powered by <a href="http://eccfze.ae">ECCFZE</a></footer>
<?php } ?>
</div>
<script src="<?= base_url('assets/bootstrap-select-1.9.4/js/bootstrap-select.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script>
    if ($(window).width() > 767) {
        var left_side_width = $('.left-side').width();
        $("#brand").css("width", left_side_width - 1);
    }
    $(window).resize(function () {
        if ($(window).width() > 767) {
            var left_side_width = $('.left-side').width();
            $("#brand").css("width", left_side_width - 1);
        }
    });
</script>
</body>
</html>
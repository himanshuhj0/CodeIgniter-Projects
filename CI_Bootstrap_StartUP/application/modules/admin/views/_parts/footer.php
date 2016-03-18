<?php if($this->session->userdata('logged_in')) { ?>
    <footer>Admin</footer>
<?php } ?>
</div>
</div>
<script src="<?= base_url('assets/public/js/bootstrap.min.js') ?>"></script>
<script>
    var left_side_width = $('.left-side').width();
    $("#brand").css("width", left_side_width - 1);
    $(window).resize(function () {
        var left_side_width = $('.left-side').width();
        $("#brand").css("width", left_side_width - 1);
    });
</script>
</body>
</html>
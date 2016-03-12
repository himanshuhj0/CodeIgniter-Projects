<div class="clear"></div>
<?= (!empty($links_pagination)) ? $links_pagination : '' ?>
<?php
if (isset($sumprices[0]['winprice']) && $sumprices[0]['winprice'] > 0) {
    $sumprices[0]['winprice'] = $sumprices[0]['winprice'] + 20000000;
    ?> 
    <div id="winprices"><p>Sum of all won games:</p><b><?= $sumprices[0]['winprice'] ?> $</b></div>'
<?php } ?>
<div class="panel-footer">ThePrizeWin.com - Powered by <a href="http://advertisingcc.com/" target="_blank">ECC FZE</a></div>
</div>
<script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/public.js') ?>"></script>
<script src="<?= base_url('assets/js/analitycs.js') ?>"></script>
<script src = "<?= base_url('assets/js/jquery-ui.min.js') ?>" ></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script> 
</body>
</html>
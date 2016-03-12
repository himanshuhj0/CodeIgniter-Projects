<div id="latestwinners">
<?php
foreach($records as $val) {
    $date = date('d.F.Y', $val['timestamp']);
?>
<div class="panel panel-default">
  <div class="panel-body">
      <?php if($val['image']!=null) { ?>
      <img src="<?= base_url() ?>attachments/latest_winners_images/<?=$val['image']?>" class="winner-img" alt="">
      <?php } ?>
      <p><?=$val['description']?></p>
  </div>
  <div class="panel-footer"><b>Win Date:</b> <?=$date?></div>
</div>
<?php
}
?>
</div>
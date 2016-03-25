<!-- Modal Convertor -->
<div class="modal fade" id="modalConvertor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Валутен конвертор</h4>
      </div>
      <div class="modal-body">
        <div class="text-center"><b>Норвежка крона</b></div>
       <div class="text-center"><img src="imgs/Loading.gif" class="loading-conv" alt="loading" style="width:50px; display:none;"><span id="noc" style="font-size:42px;"></span></div>
       <br>
       <div class="text-center"><b>Шведска крона</b></div>
       <div class="text-center"><img src="imgs/Loading.gif" class="loading-conv" alt="loading" style="width:50px; display:none;"><span id="sek" style="font-size:42px;"></span></div><br>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Затвори прозореца</button>
      </div>
    </div>
  </div>
</div>
<script>
function currency_ajax_convert(sum) {
$('#modalConvertor').modal('show');
$(".loading-conv").show();
$.ajax({
    type: "POST",
    url: "currency_convertor.php",
    data: {sum: sum}
}).done(function (data) {
	var obj = jQuery.parseJSON(data);
	$(".loading-conv").hide();
	$("#noc").empty().append(obj.NOK);
	$("#sek").empty().append(obj.SEK);
});
}

$('#modalConvertor').on('hidden.bs.modal', function (e) {
	$("#noc").empty();
	$("#sek").empty();
});
</script>
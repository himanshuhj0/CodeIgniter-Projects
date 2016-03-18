<script src="<?= base_url('assets/js/ckeditor/ckeditor.js') ?>"></script>
<div class="col-sm-9 col-sm-offset-3 col-md-offset-2">
    <textarea name="description" id="description" rows="50" class="form-control"></textarea>
    <script>
        CKEDITOR.replace('description');
    </script>
</div>
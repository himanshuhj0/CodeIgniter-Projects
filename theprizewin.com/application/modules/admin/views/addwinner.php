<div class="container">
    <div class="col-sm-6">
        <h1>Publish Winner</h1>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert"><?= validation_errors() ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('result')) { ?>
            <div class="alert alert-success" role="alert"><?= $this->session->flashdata('result') ?></div
        <?php } ?>
        <?php echo form_open_multipart(); ?>
        <div class="form-group">
            <label for="desc">Description:</label>
            <textarea name="description" id="desc" class="form-control"><?= @$_POST['description'] ?></textarea>
        </div>
        <div class="form-group">
            <?php if (isset($_POST['image']) && $_POST['image'] != null) { ?>
                Current Image:<br>
                <img src="<?= base_url('attachments/latest_winners_images/' . $_POST['image']) ?>" class="edit-image">
            <?php } ?>
            <label for="exampleInputFile">Image input</label>
            <input type="hidden" name="image" value="<?= @$_POST['image'] ?>">
            <input type="file" name="userfile" id="exampleInputFile">
            <p class="help-block">Upload image here</p>
        </div>
        <div class="form-group">
            <label for="timestamp">Date:</label>
            <input type="text" name="timestamp" id="date" value="<?= isset($_POST['timestamp']) && $_POST['timestamp'] != null ? date('d F Y', $_POST['timestamp']) : '' ?>" class="form-control">
        </div>
        <div class="alert alert-info" role="alert"><b>Date Type:</b> 05 January 2015</div>
        <div class="form-group">
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    Upload <span class="glyphicon glyphicon glyphicon-plus"></span>
                </button>
            </div>
            <?php if ($this->uri->segment(3)) { ?>
                <div class="btn-group">
                    <a href="../editwinners" class="btn btn-primary">Cancel</a>
                </div>
            <?php } ?>
        </div>
        </form>
    </div>
</div>

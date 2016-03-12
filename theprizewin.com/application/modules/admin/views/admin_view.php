<div class="container">
    <div class="row" style="margin-bottom: 50px;">
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger"><?= validation_errors() ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('uploadresult')) { ?>
            <div class="alert alert-info"><?= $this->session->flashdata('uploadresult') ?></div>
        <?php } ?>
        <div class="col-sm-6">
            <h2>Publish new prize:</h2>
            <?php echo form_open_multipart(); ?>
            <div class="form-group">
                <label for="usr">Title:</label>
                <input type="text" class="form-control" value="<?= @$_POST['title'] ?>" id="usr" name="title">
            </div>

            <div class="form-group">
                <label for="comment">Description:</label>
                <textarea class="form-control" rows="5" id="comment" name="description"><?= @$_POST['description'] ?></textarea>
            </div>

            <div class="form-group">
                <?php if (isset($_POST['image']) && $_POST['image'] != null) { ?>
                    Current Image:<br>
                    <img src="<?= base_url('attachments/images/' . $_POST['image']) ?>" class="edit-image">
                <?php } ?>
                <label for="exampleInputFile">Image input</label>
                <input type="hidden" name="image" value="<?= @$_POST['image'] ?>">
                <input type="file" name="userfile" id="exampleInputFile">
                <p class="help-block">Upload image here</p>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category">
                    <?php
                    foreach ($categories as $cat) {
                        @$_POST['category'] == $cat['name'] ? $select = 'selected' : $select = '';
                        ?>
                        <option value="<?= $cat['name'] ?>" <?= $select ?>><?= $cat['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sel1">Country:</label>
                <select class="form-control" id="category" name="country">
                    <?php
                    foreach ($countries as $cat) {
                        @$_POST['country'] == $cat['code'] ? $select = 'selected' : $select = '';
                        ?>
                        <option value="<?= $cat['code'] ?>" <?= $select ?>><?= $cat['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sel1">Visability:</label>
                <select class="form-control" id="category" name="visability">
                    <option value="yes" selected="selected">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pwd">Address:</label>
                <input type="text" class="form-control" id="pwd" value="<?= @$_POST['address'] ?>"  name="address">
            </div>

            <div class="form-group">
                <label for="winprice">Win Price:</label>
                <input type="text" name="winprice" value="<?= @$_POST['winprice'] ?>" id="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="pwd">Final Date:</label>
                <input type="text" class="form-control" id="pwd" value="<?= isset($_POST['timestamp']) && $_POST['timestamp'] != null ? date('d F Y', $_POST['timestamp']) : '' ?>" name="timestamp">
            </div>
            <div class="btn-group">
                <button type="submit" name="uploadit" class="btn btn-primary">
                    Upload <span class="glyphicon glyphicon glyphicon-plus"></span>
                </button>
            </div>
            <?php if ($this->uri->segment(3)) { ?>
                <div class="btn-group">
                    <a href="../edit" class="btn btn-primary">Cancel</a>
                </div>
            <?php } ?>
            </form>
        </div>
        <div class="col-sm-6" style="padding-top: 87px;">
            <div class="alert alert-success" role="alert">Visability field by default is <b>Visible</b></div>
            <div class="alert alert-info" role="alert">Date format is: <b>05 January 2015</b></div>
            <div class="alert alert-warning" role="alert">Best picture size <b>600x600</b> pixels and maximum <b>900x900</b> pixels</div>
            <div class="alert alert-danger" role="alert">All fields are required</div>            
        </div>
    </div>
</div>
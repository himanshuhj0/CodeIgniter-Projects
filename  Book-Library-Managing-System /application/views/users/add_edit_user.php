<div class="row">
    <div class="col-sm-6"> 
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert"><?= validation_errors() ?></div> 
        <?php } ?>
        <h1>Създаване/Редактиране на потребител</h1>
        <?= form_open('users/add_edit_user/' . @$_POST['id']); ?>
        <div class="form-group">
            <label for="name">Име:</label>
            <input type="text" name="name" value="<?= @$_POST['name'] ?>" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="family">Фамилия:</label>
            <input type="text" name="family" value="<?= @$_POST['family'] ?>" class="form-control" id="family">
        </div>
        <div class="form-group">
            <label for="phone_number">Телефон:</label>
            <input type="text" name="phone_number" value="<?= @$_POST['phone_number'] ?>" class="form-control" id="phone_number">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= @$_POST['email'] ?>" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="address">Адрес:</label>
            <input type="text" name="address" value="<?= @$_POST['address'] ?>" class="form-control" id="address">
        </div>
        <button type="submit" class="btn btn-primary">Създай</button>
        <a href="<?= base_url('users') ?>" class="btn btn-default">Отказ</a>
        </form>
    </div>
</div>
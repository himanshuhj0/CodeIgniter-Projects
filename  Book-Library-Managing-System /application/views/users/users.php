<?php if ($this->session->flashdata('message') != null) { ?>
    <div class="alert alert-info" role="alert"><?= $this->session->flashdata('message') ?></div>
<?php } ?>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <a href="<?= base_url('users/add_edit_user') ?>" class="btn btn-primary">Създай потребител</a>
        </div>
    </div>
    <div class="col-sm-6">  
        <form method="get" action="users">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="finduser" placeholder="Търси по потребителско име, телефон или email" value="<?= $this->input->get('finduser') ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Търси</button>
                        <a href="<?= base_url('users') ?>" class="btn btn-default">Изчисти</a>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Име</th>
            <th>Фамилия</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Адрес</th>
            <th>Взети книги</th>
            <th>Профил</th>
            <th>Изтриване</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['family'] ?></td>
                <td><?= $user['phone_number'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['address'] ?></td>
                <td><a href="<?= base_url('users/used_books/' . $user['id']) ?>"class="btn btn-default">Преглед/Редакция <span class="badge"><?= $user['num_get_books'] ?></span></a></td>
                <td><a href="<?= base_url('users/add_edit_user/' . $user['id']) ?>" class="btn btn-default">Редактирай</a></td>
                <td><a href="<?= base_url('users/delete/' . $user['id']) ?>" class="btn btn-danger" onclick="return confirm('Наистина ли искате да изтриете този потребител?')">Изтрии</a></td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php if (!empty($links_pagination)) { ?>
    <div class="row text-center">
        <div class="col-lg-12">
            <?= $links_pagination ?>
        </div>
    </div>
<?php } ?>
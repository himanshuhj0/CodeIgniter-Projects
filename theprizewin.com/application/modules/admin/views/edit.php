<div class="container">
    <?php if ($this->session->flashdata('deleteresult')) { ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('deleteresult') ?></div>
    <?php } ?>
    <div class="alert alert-info" role="alert">Number of published Prizes: <span class="badge"><?= $reccount ?></span></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Prize Name</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($prizes as $val) {
                ?>
                <tr>
                    <td><a href="<?= base_url($val['id'] . '-test-view') ?>" target="_blank"><?= $val['title'] ?></a></td>
                    <td><?= $val['title'] ?></td>
                    <td><a href="<?= base_url('admin/index/' . $val['id']) ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="<?= base_url('admin/delete/prizes/' . $val['id']) ?>" class="delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?= $links_pagination ?>
</div>
<script>
    $(document).ready(function () {
        $(".delete").click(function () {
            var r = confirm("Are you sure want to delete this prize?!");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
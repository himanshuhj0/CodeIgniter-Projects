<div class="container">
    <h1>Edit Winners</h1>
    <div class="alert alert-info" role="alert">Number of Winners: <span class="badge"><?= $reccount ?></span></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($winners as $winner) { ?>
                <tr>
                    <td><?= date('d.m.Y', $winner['timestamp']) ?></td>
                    <td><?= $winner['description'] ?></td>
                    <td><a href="<?= base_url('admin/addwinner/' . $winner['id']) ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="<?= base_url('admin/delete/latestwinners/' . $winner['id']) ?>" class="delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?= $links_pagination ?>
</div>
<script>
    $(document).ready(function () {
        $(".delete").click(function () {
            var r = confirm("Are you sure want to delete this winner?!");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
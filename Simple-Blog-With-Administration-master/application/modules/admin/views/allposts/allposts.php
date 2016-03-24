<?php if ($this->session->flashdata('result')) { ?>
    <div class="alert alert-info"><?= $this->session->flashdata('result') ?></div>
<?php }
?>  
<h2>List posts:</h2>
<div class="table-responsive">
    <table class="table">
        <tr>
            <td><b>Title</b></td>
            <td><b>Date Publish</b></td>
            <td><b>Edit</b></td>
            <td><b>Delete</b></td>
        </tr>
        <?php foreach ($result as $res) { ?>
            <tr>
                <td><a href="<?= base_url($res['id'].'-view') ?>" target="_blank"><?= $res['title'] ?></a></td>
                <td><?= $res['date'] ?></td>
                <td><a href="<?= base_url('admin/edit') . '/' . $res['id'] ?>">Edit</a></td>
                <td><a class="delete" href="<?= base_url('admin/delete') . '/' . $res['id'] ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</div> 
<?= $links_pagination ?>
<script>
    $(document).ready(function () {
        $(".delete").click(function () {
            if (!confirm('Are you sure you want to delete that?')) {
                return false;
            }
        });
    });
</script>
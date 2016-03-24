<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    </head>
    <body>
        <div class="container">
            <div id="admin-login">
                <h1>Administration</h1>
                <?php echo form_open('admin/validate'); ?>
                Username: 
                <input type="text" name="username">
                Password:  
                <input type="password" name="password">
                <input type="submit" class="submit" value="Login">
                </form>
            </div>
        </div>

    </body>
</html>
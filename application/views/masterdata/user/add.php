<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <form method="post" action="<?php echo base_url('masterdata/user/user_add'); ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="role">Role:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        
        <button type="submit">Add User</button>
    </form>
    <a href="<?php echo base_url('masterdata/user'); ?>">Back to User List</a>
</body>
</html>

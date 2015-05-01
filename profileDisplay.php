<div>
    <h4><a href="profile_listings.php">View list of registered users.</a></h4>
</div>
<div id="profile-display">
    <h1><?= $first_name; ?> <?= $last_name; ?>'s Profile</h1>
    <table class="profileTable">
        <tr>
            <td>First name:</td>
            <td width="99%"><?= $first_name; ?></td>
        </tr>
        <tr>
            <td>Last name:</td>
            <td><?= $last_name; ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?= $user_email; ?></td>
        </tr>
        <tr>
            <td>Background:</td>
            <td><?= $background; ?></td>
        </tr>
        <tr>
            <td>Education:</td>
            <td><?= $education; ?></td>
        </tr>
        <tr>
            <td>Skills:</td>
            <td><?= $skills; ?></td>
        </tr>
        <tr>
            <td>Role:</td>
            <td><?= $role; ?></td>
        </tr>
    </table>
</div>
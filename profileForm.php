<form id="profile-edit-form" style="display: none" action="profile.php" method="post">

    <div class="formField">
        <label for="background">Edit your background: </label>
        <textarea id="background" name="background" form="profile-edit-form" rows="7"><?=$background;?></textarea>
    </div>
    <div class="formField">
        <label for="education">Edit your education:</label>
        <textarea id="education" name="education" form="profile-edit-form" rows="7"><?=$education;?></textarea>
    </div>
    <div class="formField">
        <label for="skills">Edit your skills:</label>
        <textarea id="skills" name="skills" form="profile-edit-form" rows="7"><?=$skills;?></textarea>
    </div>

    <div class="formField">
        <label for="role">Change your role:</label>
        <input id="role" list="roles" name="role" value="<?=$role;?>" />

        <datalist id="roles">
            <option>Mentor</option>
            <option>Alumni</option>
            <option>Undergraduate</option>
            <option>Graduate</option>
        </datalist>
    </div>

    <input type="submit" value="Save" />
</form>
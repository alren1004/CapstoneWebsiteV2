<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/internship.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
</head>
<body>

<div class="wrapper">

    <?php
    if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
        // Logged in.
        include "logoutButton.html";
    } else {
        // Not logged in.
        include "loginForm.html";
    }
    include "header.html";
    ?>

    <div class="container">

        </form>

        <h1><i>Internship Search</i></h1>
            <form action="internship_search.php" method="POST">
                <table border="0" cellspacing="0" cellpadding="6" style="padding:25px; border:1px dotted #ccc; ">
                    <tr>
                        <td><label>Location</label></td>
                        <td><input name="Location" placeholder="City, State or Zip Code" type="text" size="25" /></td>
                    </tr>
                    <tr>
                        <td><label>Company</label></td>
                        <td><input type="Company" placeholder="Microsoft, IBM, Google" size="25" /></td>
                    </tr>
                    <tr>
                        <td><label for="Sector">Employer Type</label></td>
                        <td><select data-val="true" data-val-required="The Employer Type field is required." id="Sector" name="Sector">
                            <option selected="selected" value="None">All</option>
                            <option value="Profit">Profit</option>
                            <option value="Nonprofit">Non-Profit</option>
                            <option value="Government">Government</option>
                        </td></select>
                    </tr>
                    <tr>
                        <td><label>Compensation</label></td>
                        <td><select data-val="true" data-val-required="The Compensation field is required." id="Compensation" name="Compensation">
                            <option selected="selected" value="All">All</option>
                            <option value="Paid">Paid</option>
                            <option value="Unpaid">Unpaid</option>
                        </td></select>
                    </tr>
                    <tr>
                        <td><label for="Employment">Full/Part Time</label>
                        <td><select data-val="true" data-val-required="The Full/Part Time field is required." id="Employment" name="Employment">
                            <option selected="selected" value="All">All</option>
                            <option value="FullTime">Full-Time</option>
                            <option value="PartTime">Part-Time</option>
                        </td></select>
                    </tr>
                    <tr>
                        <td><label>Submit</label></td>
                        <td><input type="submit" value="Click" /></td>
                    </tr>
                    <tr>
                        <td><label>Reset</label></td>
                        <td><input type="reset" value="Click" /></td>
                    </tr>
                </table>
            </form>


    </div>
</div>





<div class="css-slideshow">
	<figure>
		<img src="img/internsearch.png" alt="Fans" width="500" height="300" class="Fans"> 
	</figure>
	
	<figure>
		<img src="img/internsearch1.png" alt="Fans1" width="500" height="300" class="Fans1"> 
	</figure>
	
	<figure>
		<img src="img/internsearch2.jpg" alt="Fans2" width="500" height="300" class="Fans2">
	</figure>
	
	<figure>
		<img src="img/internsearch3.jpg" alt="Fans3" width="500" height="300" class="Fans3"> 
	</figure>
	
	<figure>
		<img src="img/internsearch5.jpg" alt="Fans5" width="500" height="300" class="Fans5">
	</figure>
	
	<figure>
		<img src="img/internsearch6.png" alt="Fans6" width="500" height="300" class="Fans6">
	</figure>
	
	<figure>
		<img src="img/internsearch7.jpg" alt="Fans7" width="500" height="300" class="Fans7">
	</figure>
	
	<figure>
		<img src="img/internsearch8.jpg" alt="Fans8" width="500" height="300" class="Fans8">
	</figure>
</div>  		







<script type="text/javascript">
    $(document).ready(function () {
        var $frm = $('.search-form form');
        var loc = $('#Location', $frm).val();
        if (loc.length > 0) {
            $('.radius-wrap', $frm).slideDown();
        } else {
            $('.radius-wrap', $frm).slideUp();
        }
        $('#Location', $frm).bind('keyup change', function () {
            if ($(this).val().length > 0) {
                $('.radius-wrap', $frm).slideDown();
            } else {
                $('.radius-wrap', $frm).slideUp();
            }
        });

        $frm.bind('submit', function () {
            _gaq.push(['_trackEvent', window.pageCampaign, 'Run Another Search', window.pageLabel]);
        });

        $('.idc-icon-search', $frm).click(function () {
            $frm.find('#FilterBy').val('');
        });
    });
</script>

<?php include "footer.html"; ?>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/dialogForm.js"></script>





</body>
</html>
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
        <h1><i>Start Your</i> Internship Search</h1>

        <h3>Search Internships</h3>

        <form action="/search/posts" method="get">

            <label for="ListingType"></label>
            <br/>

            <label for="ListingType_None">All Opportunities</label>
            <input type="radio" name="ListingType" id="ListingType_None" value="None">
            <br/>

            <label for="ListingType_internship">Internships</label>
            <input type="radio" name="ListingType" id="ListingType_Internship" value="Internship" checked=&quot;checked&quot;>
            <br/>

            <label class="radioDisplay" for="ListingType_EntryLevelJob">Entry Level Jobs</label>
            <input type="radio" name="ListingType" id="ListingType_EntryLevelJob" value="EntryLevelJob">
            <br/>

            <label for="ListingType_StudentJob">Student Jobs</label>
            <input type="radio" name="ListingType" id="ListingType_StudentJob" value="StudentJob">
            <br/>
            <br/>

            <label for="ListingType_Keywords(Major)">Keyword(Major)</label>
            <input id="Keywords" name="Keywords" placeholder="Marketing, Design,..." type="text" value=""/>
            <br/>

            <label>Location</label>
            <input id="Location" name="Location" placeholder="City, State or Zip Code" type="text" value=""/>
            <br/>

            <label for="Company">Company</label>
            <input id="Company" name="Company" placeholder="Microsoft, Disney" type="text" value=""/>
            <br/>
            <br/>

            <label for="Sector">Employer Type</label>
            <select data-val="true" data-val-required="The Employer Type field is required." id="Sector" name="Sector">
                <option selected="selected" value="None">All</option>
                <option value="Profit">Profit</option>
                <option value="Nonprofit">Non-Profit</option>
                <option value="Government">Government</option>
            </select>
            <br/>
            <label for="Compensation">Compensation</label>
            <select data-val="true"
                    data-val-required="The Compensation field is required."
                    id="Compensation" name="Compensation">
                <option selected="selected" value="All">All</option>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select>
            <br/>
            <label for="Employment">Full/Part Time</label>

            <select data-val="true"
                    data-val-required="The Full/Part Time field is required."
                    id="Employment" name="Employment">
                <option selected="selected" value="All">All</option>
                <option value="FullTime">Full-Time</option>
                <option value="PartTime">Part-Time</option>
            </select>
            <br/>
            <br/>
            <input id="FilterBy" name="FilterBy" type="hidden" value="{}"/>
            <input type="hidden" name="Page" id="Page" value="1"/>
            <button type="submit">Search</button>
        </form>
    </div>
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
<?php
$config = new Config();
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>
        Attributes task
    </title>
</head>

<body>
    <div class="container">
        <div class="box1">
            <form id="form" action="<?= $config::ROOT_DIRECTORY; ?>attributes_submit/" method="POST">
                <h3>Submit to database:</h3>
                <input type="submit" class="box1__submit" name="box1__submit" value="Submit changes">
        </div>
        <div class="box2">
            <h3>Add / Remove attributes</h3>
            <label> Attribute name: </label>
            <input type="text" name="att-1" placeholder="Age, height etc" required> <br>
            <label> Attribute Value: </label>
            <input type="text" name="val-1" placeholder="37, 190cm, etc" required> <br>
            <input type="button" value="Add" onClick="addAttribute();">
            <input type="button" value="Delete" onClick="deleteAttribute();">
            <!-- INVISIBLE CUNTER FOR COUNTING HOW MANY ATTRIBUTES HAVE BEEN ADDED-->
            <input type="hidden" class="counter" name="counter" value="1">
            </form>
        </div>
    </div>
</body>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- RESET COUNTER WHEN USER HITS BACK OR ON PAGE LOAD -->
<script>
    $(document).ready(function() {
        $('.counter').val('1');
    });
</script>

</html>
<!DOCTYPE html>
<html>

<head>
    <style>
    .Template img {
        height: 200px;
    }

    .propic {
        width: 100px;
    }
    </style>

    <title>PROFILE PICTURE</title>
</head>

<body>
    <div class="propic">

        <form action="page2/part2.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend><B>PROFILE PICTURE</B></legend> <br>
                <div class="Template">
                    <img src="page2/Template.png"><br><br>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <br>
                <hr>
                <input type="submit" name="submit">
        </form>
        </fieldset>

    </div>


</body>

</html>
<!-- for demonstration -->
<html>
    <head>
        <title>TDD Demo</title>
        <style>
            body { 
                font-family: Arial, Helvetica, sans-serif;
                font-size: 1.2em;
                color: grey;
            }

            /* 
            Flush left, ragged right
            1.25em basic leading (line height), one lead boundary (vertical margins)
            */

            p {
                line-height: 1.25em;
                margin: 1.25em 0;
                text-align: left;
            }

            form {
                color: darkgrey;
            }
        </style>
    </head>
    <body>
        <?php
        include_once "Para.php";
        if (!isset($default_value)) {
            $default_value = Para::DEFAULT_COLUMNS;
        }
        ?>

        <!-- form -->
        <form action="index.php" method="post">
            Number of columns: <input type="text" name="columns" maxlength="4">
            <input type="submit" name="formSubmit" value="Submit">
        </form>

        <?php
        if (key_exists('columns', $_POST) && $_POST['formSubmit'] == "Submit") {
            $columns = (int) $_POST['columns'];
        } else {
            $columns = Para::DEFAULT_COLUMNS;
        }
        if (is_int($columns) && $columns > 1) {
            processForm($columns);
        }
        $default_value = $columns;

        function processForm($columns) {
            $para = new Para($columns);
            $text = <<<EOF
My money's in that office, right? If she start giving me some bullshit about it ain't there, and we got to go someplace else and get it, I'm gonna shoot you in the head then and there. Then I'm gonna shoot that bitch in the kneecaps, find out where my goddamn money is. She gonna tell me too. Hey, look at me when I'm talking to you, motherfucker. You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. You understand?
                 
   
Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I'm in a transitional period so I don't wanna kill you, I wanna help you. But I can't give you this case, it don't belong to me. Besides, I've already been through too much shit this morning over this case to hand it over to your dumb ass.
EOF;
            echo "[Lenght: $columns]<br/>";
            echo $para->format_for_web($text);
        }
        ?>
    </body>
</html>
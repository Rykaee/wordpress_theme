<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    </link>
    <?php wp_head();?>
    

    

</head>
<body>
    
<header>
    <div class="container">
        <?php
            wp_nav_menu( 
                array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'top-bar'

                )
            );
        ?>
    </div>
</header>
<?php

    $m = "Maintenance";
    $s = "Support service";
    $a = "All in one";
    $n = "None";

    if (strpos($email, $admin) !== false) { ?>
        <div id="adminsettings">

            <div class="panel-left">   
                <form method="post" action="options.php">
                
                    <?php settings_fields('bgpo_main_group'); ?>

                    <h3>Settings</h3>

                    <input type="radio" name="bgpo_main_pack" value="<?php echo $m; ?>"
                    
                    <?php
                        if ($status == $m) {
                                echo 'checked="checked" ';
                        }
                    ?> /> <?php echo $m; ?> <br>
                    <input type="radio" name="bgpo_main_pack" value="<?php echo $s; ?>" 
                    
                    <?php
                        if ($status == $s) {
                                echo 'checked="checked" ';
                        }
                    ?> /> <?php echo $s; ?> <br>
                    <input type="radio" name="bgpo_main_pack" value="<?php echo $a; ?>" 
                    
                    <?php
                        if ($status == $a) {
                                echo 'checked="checked" ';
                        }
                    ?> /> <?php echo $a; ?> <br>
                    <input type="radio" name="bgpo_main_pack" value="<?php echo $n; ?>"
                    
                    <?php
                        if ($status == $n) {
                                echo 'checked="checked" ';
                        }
                    ?> /> <?php echo $n; ?> <br>
                    <div class="adm_but"><?php submit_button(); ?></div>
                </form>
                
            </div>

            <div class="panel-right">

                <h3>Last Update Date</h3>
                <?php echo '<p class="date_update">'.$date.'</p>'; ?>

                <form method="post" action="options.php">
                    
                    <?php 
                
                    settings_fields('bgpo_date_group'); 
                    
                    $currentDateTime = new \DateTime();
                    $currentDateTime->setTimezone(new \DateTimeZone('Europe/Riga'));
                    $dateTime = $currentDateTime->format('Y/m/d');

                    ?>

                    <input class="hidden_input" type="radio" name="bgpo_date_pack" value="<?php echo $dateTime; ?>" checked="checked">
                    <div class="adm_but"><p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Update Date"></p></div>
                    
                </form>

            </div>

        </div>
    <?php } ?>
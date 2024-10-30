<?php

if ($upd > 0) {
    $upd_html = '<p class="upd_row">There are <b class="upd_num">' . $upd . '</b> updates available.</p>';
} else if ($upd == 0) {
    $upd_html = '<p class="upd_row"><b>Great! Site is up to date!</b></p>';
}

?>

<div id="blueglass-welcome" class="welcome-panel-blueglass">
    <div class="welcome-panel-content">

        <div class="panel-left">             
            <h2><b>BlueGlass Admin Panel</b></h2>
            <p><b>Address:</b> <a href="https://www.google.com/maps/place/BlueGlass+-+E-poe+ja+Kodulehe+Tegemine/@59.4143147,24.7598902,17z/data=!3m1!4b1!4m5!3m4!1s0x4692935dfb49e31d:0x8257245708e0694!8m2!3d59.4143147!4d24.7620842" target="_blank">Järvevana tee 7b, 10132, Tallinn</a></p>
            <p><b>Phone:</b> <a href="tel:+37259192088">+372 5919 2088</a></p>
            <p><b>Email:</b> <a href="mailto:info@blueglass.ee">info@blueglass.ee</a></p>
            <a href="https://www.blueglass.ee" target="_blank">
                <img class="bg-logo" src="<?php echo $url; ?>dist/img/bg-logo.png" alt="BlueGlass" width="150">
            </a>
            <p class="about-description">Handcrafted with 💙</p>
        </div>

        <div class="panel-center"> 
            <?php
                if ($status == 'None') { ?> 
                    <h3>Maintenance package status:</h3><p class="main_status disabled"><b>DISABLED</b></p>
                    <?php echo $upd_html; ?>
                    <a href="https://www.blueglass.ee/en/services/maintenance-packages/" target="_blank" class="button-primary"><b>See packages and get maintenance today!</b></a>

                <?php } else { ?>
                    
                    <h3>Maintenance package status:</h3><p class="main_status enabled"><b>ENABLED</b></p>
                    <h3>Current package:</h3>
                    <p class="pack_cur"><?php echo $status; ?></p>
                    <br><?php echo $upd_html; ?>
                    <br><a href="https://www.blueglass.ee/en/services/maintenance-packages/" target="_blank" class="button-primary"><b>See packages and get maintenance today!</b></a>
            <?php } ?>
        </div>

        <div class="panel-right"> 
            <h3>Useful links:</h3>
            <a href="https://www.blueglass.ee/en/contact#gform_wrapper_1" target="_blank" class="button-primary">Contact us!</a>
        </div>

    </div>
</div>
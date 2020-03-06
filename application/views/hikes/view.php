<?php
//application/views/news/view.php
$this->load->view($this->config->item('theme') . 'header');

    /*

        copy & paste your db table fields from adminer into the file you're working in.

        You can copy/paste from it to make your work easier!

        HikeID	int(10) unsigned Auto Increment	
        UserID	int(10) unsigned NULL [0]	
        HikeName	varchar(255) NULL []	
        Location	varchar(255) NULL []	
        Gain	smallint(6) NULL [0]	
        HighestPoint	smallint(6) NULL [0]	
        Length	float NULL [0]	
        Rating	tinyint(4) NULL [0]	
        Difficulty	tinyint(4) NULL [0]	
        Description	text NULL	
        Directions	text NULL	
        DateAdded	datetime NULL	
        LastUpdated	timestamp [0000-00-00 00:00:00]
    */
?>

<h2><?=$hike['HikeName']?></h2>
<p><b></b></p>
<p><b style="vertical-align:top">Rating:</b> <?=showRating($hike['Rating'])?></span></p>
<p><b>Location:</b> <?=$hike['Location']?></p>
<p><b>Elevation Gain:</b> <?=$hike['Gain']?> ft.</p>
<p><b>Highest Point:</b> <?=$hike['HighestPoint']?> ft.</p>
<p><b>Length:</b> <?=$hike['Gain']?> miles</p>
<p><b>Contributed By:</b> <?=$hike['FirstName']?> <?=$hike['LastName']?></p>
<p><b>Difficulty:</b> <?=$hike['Difficulty']?></p>
<p><b>Description:</b> <?=nl2br($hike['Description'])?></p><br />
<p><b>Directions:</b> <?=nl2br($hike['Directions'])?></p>
<p><a href="<?=site_url('hikes/delete/'. $hike['HikeID'])?>">Delete Hike</a></p>
<?php
$this->load->view($this->config->item('theme') . 'footer');
?>

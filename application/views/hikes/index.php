<?php
//application/views/hikes/index.php
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
<h2><?=$title?></h2>

<?php foreach ($Hikes as $hike): ?>

<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?=$hike['HikeName']?></h3>
    </div>
    <div class="panel-body">
        <p><span style="vertical-align:top">Rating:</span> <?=showRating($hike['Rating'])?></p>
        <p>Difficulty: <?=$hike['Difficulty']?></p>
        <p>Length: <?=$hike['Length']?> miles</p>
        <p>Location: <?=$hike['Location']?></p>
        <p>Contributed By: <?=$hike['FirstName']?> <?=$hike['LastName']?></p>
        <p><a href="<?=site_url('hikes/'. $hike['HikeID'])?>">View hike</a></p>
    </div>
</div>
<?php endforeach; ?>
<?php
$this->load->view($this->config->item('theme') . 'footer');
?>


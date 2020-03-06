<?php
//application/views/hikes/user.php
/* 

    hikes for one user only
    based on index() in controller, index.php view and get_hikes() in model
    
*/    

$this->load->view($this->config->item('theme') . 'header');

?>
<h2><?=$title?></h2>

<?php foreach ($hikes as $hike): ?>

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


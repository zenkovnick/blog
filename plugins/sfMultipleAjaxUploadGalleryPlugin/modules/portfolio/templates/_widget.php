<table cellpadding="0" cellspacing="0" class="rounded widget">
    <thead>
    <th class="tab_top_left_bg"></th>
    <th class="tab_top_bg"></th>
    <th class="tab_top_right_bg"></th>
</thead>
<tbody>
    <tr id="middle">
        <td class="tab_side_left"></td>
        <td>
<?php 
$nb = 4;
$galleries = Gallery::getNbGalleries($nb);
if(count($galleries)>=1) { ?>
    <a href="<?php echo url_for("@listGalleries"); ?>"><p class="pancarte" id="photos"></p></a>
    <div class="clear"></div>
    <table style="margin-left: -5px" class="small">
        <?php foreach ($galleries as $i=>$gallery): ?>
        <tr>
            <td>
                <div class="timestamp_fade" style="float: left; ">
                    <?php echo $gallery->getDateTimeObject('created_at')->format('d'); ?><br/>
                    <?php echo $gallery->getDateTimeObject('created_at')->format('M'); ?>
                    <?php $default = $gallery->getPhotoDefault()->getPicpath() ?>
                </div>
            </td>
            <td>
                <a href="<?php echo url_for(@showGallery, $gallery) ?>">
                    <img src="../uploads/thumbnail/50_<?php echo $default ?>"/>
                </a>
            </td>
            <td>
                <a href="<?php echo url_for(@showGallery, $gallery) ?>#/uploads/<?php echo $default ?>">
                    <?php echo $gallery->getTitle() ?>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
    <div class="clear"></div>
    <a style="float:right; " href="<?php echo url_for("@listGalleries"); ?>">+ les voir toutes !</a><div class="clear"></div>
    <?php } ?>

</td>
        <td class="tab_side_right"></td>
    </tr>
</tbody>
<tfoot>
<th class="tab_bottom_left_bg"</th>
<th class="tab_bottom_bg"></th>
<th class="tab_bottom_right_bg"</th>
</tfoot>
</table>
<?php
$tabInfos = getInfos();
$informations = "";
foreach ($tabInfos as $i) {
    $informations .= $i->info . ' --- ';
}
//enlever les trois dernier tirets:
$informations = substr($informations,0,-5);
?>
<div class="row">
    <div class="col s2 blue-text"><span class="right">INFORMATIONS :</span></div>
    <div class="col s10">
        <span class="orange-text">
            <marquee>
                <span class="blue-grey-text"><?= $informations ?></span>
            </marquee>
        </span>
    </div>
</div>
<?php
$active_flag = "images";
require 'header.php';

function startsWith($haystack, $needle) {
  // search backwards starting from haystack length characters from the end
  return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

function list_svg($dir_path) {
    if($handle = opendir($dir_path)){
        $svg = [];
        while(($entry = readdir($handle)) != false) {
            if(endsWith($entry, "svg"))
                $svg[] = $entry;
        }
        closedir($handle);
        sort($svg);
        return $svg;
    }
    return [];
}
function img_links_br($dir_path){
    foreach( list_svg($dir_path) as $f ){
        $path = $dir_path . $f;
        echo '<a href="', $path, '"><img src="', $path, '" height="300"/></a><br/>';
    }
}
$dspace_dir = "resources/dspace-1.5.1/";
$mywm_dir = "resources/mywm/";
?>
<div class="tab-pane" id="images">
                    <h1>Images</h1>
                    <h3>Dspaces 1.5.1 graphs</h3>
                    <p>
                        Graphs generated from the <a href="http://www.dspace.org">dspace project</a> (v 1.5.1 - 256 Java files spread in 27 packages and summing 44 KLOC).<br/>
                        Violations were identified with this <a href="<?= $dspace_dir ?>decouple.pl" download >constraint file</a>. The constraint has been devised in this <a href="http://arxiv.org/abs/1305.2398"> article</a>.<br/>
                    First image is produced by selecting the "focus on violations" options. The second one displays every packages with the virtual edges between their content.
                    </p>
                    <?php img_links_br($dspace_dir); ?>
                    <h3>MyWebMarket graphs</h3>
                    <p>Graphs generated from the <a href="http://ieeexplore.ieee.org/xpl/articleDetails.jsp?arnumber=6178900">MyWebMarket example code.</a> (38 Java files, spread in 9 packages summing 1.4 KLOC).<br/>
                    Violations were identified with this <a href="<?= $mywm_dir ?>/decouple.pl" download >constraint file</a>. The constraint has been devised by translating the <a href="http://aserg.labsoft.dcc.ufmg.br/dclsuite/"> DCL</a> constraint <a href="<?= $mywm_dir ?>architecture.dcl" download>file</a>.<br/>
                    First image is produced by selecting the "focus on violations". Second one displays all sub packages of the com.mymwm package. The third one is the same but each virtual edge is labeled with the number of real dependencies they are abstracting. The last image is a random example of a customized view.</p>
                     <?php img_links_br($mywm_dir); ?>
                   </div>

<?php
require 'footer.php';
?>

<? 
include('sites/all/themes/tihiy/safemysql.php');
$mydb = new MyDB\SafeMySQL();
include('header.php');
?>

  <? if($is_admin) : ?>
  <h3 class="edit_node">
    <a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
  </h3>
  <? endif; ?>

  <section class="sect section_main_head">
    <div class="wrappall">
      <?= render($page['content']); ?>
    </div>
  </section>

<? $block_option = $mydb->getAll('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` IN (?a)',array(27, 10, 28, 29, 30, 13, 39, 40)); ?>
  
  <section class="sect section_fishing">
    <div class="wrapper">
      <div class="content option container_fishing container_options">
        <?=modul_my_render($block_option[7], $is_admin);?>
        <?=modul_my_render($block_option[2], $is_admin);?>
        <?=modul_my_render($block_option[0], $is_admin);?>
        <?=modul_my_render($block_option[3], $is_admin);?>
        <?=modul_my_render($block_option[4], $is_admin);?>
        <?=modul_my_render($block_option[5], $is_admin);?>
      </div>
    </div>
  </section>

  <section class="sect section_map_hotel fishing">
    <div class="wrapper container_options">
      <?=modul_my_render($block_option[1], $is_admin);?>
    </div>
  </section>

  <section class="sect main_photo">
    <div class="wrappall">
      <div class="content photo container_photo container_options">
        <h2 class="container_title text_center">Фото с рыбалки</h2>
        <?=modul_my_render($block_option[6], $is_admin);?>
      </div>
    </div>
  </section>

<? include('footer.php'); ?>
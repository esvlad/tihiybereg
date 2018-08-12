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

  <section class="sect section_contact">
    <div class="wrapper">
      <div class="content contact container_contact container_options">
        <?= render($page['content']); ?>
      </div>
    </div>
  </section>

  <section class="sect section_map_hotel">
    <div class="wrapper container_options">
      <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 12 LIMIT 0,1'), $is_admin); ?>
    </div>
  </section>
  <section class="sect section_map_hotel">
    <div class="wrapper container_options">
      <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 43 LIMIT 0,1'), $is_admin); ?>
    </div>
  </section>
  <section class="sect section_map_hotel">
    <div class="wrapper container_options">
      <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 13 LIMIT 0,1'), $is_admin); ?>
    </div>
  </section>

<? include('footer.php'); ?>
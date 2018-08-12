  <header class="sect section_header">
    <div class="wrapper">
      <div class="content header">
        <div class="head_logo">
          <a class="home_page" href="<?php print $front_page; ?>">
            <img src="../sites/all/themes/tihiy/img/other/logotype-svg.svg" class="logotype" alt="Тихий берег" title="тихий берег">
          </a>
        </div>
        <?php 
          $main_menu = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          print drupal_render($main_menu); 
        ?>
        <div class="request_call">
          <div class="request_call__number"><a href="tel:+79050070004">+7 905 007-0004</a></div>
          <div id="rcPopupForm" class="request_call__button" data-btn-text="Заказать звонок"><span>Заказать звонок<span></div>
        </div>
      </div>
    </div>
  </header>
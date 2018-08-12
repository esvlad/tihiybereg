  <section class="sect section_map">
    <div class="wrapper">
      <div class="content map container_map">
        <div class="container_map_text">
          <h2 class="map_how_to_get">Как добраться?</h2>
          <p>Из&nbsp;Уфы можно добраться через Шакшу или Иглино по&nbsp;M5. Нужно ехать в&nbsp;сторону Павловки, и&nbsp;повернуть направо, в&nbsp;&laquo;Ишмуратово&raquo;, через 150 метров после дорожного знака &laquo;Старокулево&raquo;. Отель будет находиться в&nbsp;4&nbsp;километрах от&nbsp;деревни &laquo;Староисаево&raquo;.</p>
          <p>Для удобства мы&nbsp;прикрепили карту &laquo;Яндекса&raquo;, можете воспользоваться навигатором.</p>
          <p>Нуримановский район, деревня Староисаево, ул. Молодежная, 30</p>
        </div>
        <div id="yaMap" class="container_map_yaMap">
          
        </div>
        <div class="container_map_info_btn">
          <p class="map_info__address">Нуримановский район, деревня Староисаево, <span>ул. Центральная, 20</span></p>
          <p class="map_info__phone">Телефон <a href="tel:+79050070004">+7 905 007-0004</a></p>
          <div id="rcPopupFormFooter" class="map__btn_rcall" data-btn-text="Заказать трансфер">Заказать трансфер</div>
        </div>
      </div>
    </div>
  </section>
  <footer class="sect section_foot">
    <div class="wrapper">
      <div class="content">
        <div class="copyright"> 
          <p>Тихий берег 2016<br/>Все права защищены</p>
        </div>
        <div class="social_btn">
          <div class="social_btn_block">
            <a href="//vk.com/club159937586" target="_blank" class="social_btn__vk"></a>
            <a href="//facebook.com/baza.otdyhaufa/" target="_blank" class="social_btn__fb"></a>
            <a href="//instagram.com/baza_otdyha_ufa" target="_blank" class="social_btn__in"></a>
          </div>
        </div>
        <div class="development">
          <p>Разработали в <a href="http://promolink.su/" target="_blank">Promolink</a></p>
        </div>
      </div>
    </div>
  </footer>
  <div id="popup" data-modal="rcPopupForm" class="absolute webform fade">
    <div class="popup_box">
      <div class="popup_close"></div>
      <h2 class="popup_box__title">Заказ обратного звонка</h2>
      <p class="popup_box__caption">Пожалуйста, заполните все поля ниже, и&nbsp;менеджер &laquo;Тихого берега&raquo; перезвонит вам в&nbsp;течение получаса.</p>
      <? $block = module_invoke('webform', 'block_view', 'client-block-120');
                  print render($block['content']); ?>
    </div>
  </div>
  <div id="popup" data-modal="rcPopupFormFooter" class="absolute webform fade">
    <div class="popup_box">
      <div class="popup_close"></div>
      <img class="popup_box__image" src="/sites/all/themes/tihiy/img/other/modal_transfer.png">
      <h2 class="popup_box__title">Заказ трансфера</h2>
      <p class="popup_box__caption">Для гостей предлагаем услуги бесплатного трансфера до&nbsp;рецепции лодж-отеля и&nbsp;обратно. Оставьте заявку и&nbsp;наш менеджер свяжется с&nbsp;вами, чтобы выяснить детали маршрута.</p>
      <? $block = module_invoke('webform', 'block_view', 'client-block-126');
                  print render($block['content']); ?>
    </div>
  </div>
  <div id="popup" data-modal="rcPopupFormFish" class="absolute webform fade">
    <div class="popup_box">
      <div class="popup_close"></div>
      <h2 class="popup_box__title">Прокат инвентаря</h2>
      <p class="popup_box__caption">За&nbsp;информацией по&nbsp;прокату обратитесь на&nbsp;ресепшн. Оплата по&nbsp;факту за&nbsp;вес выловленной рыбы.</p>
    </div>
  </div>
  <div id="popup_fade"></div>


ymaps.ready(function () {
		    var myMap = new ymaps.Map('yaMap', {
		            center: [55.106575, 56.670125],
		            zoom: 12
		        }, {
		            searchControlProvider: 'yandex#search'
		        }),
		        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
		            /*hintContent: 'Собственный значок метки',*/
		            balloonContent: 'Тихий берег'
		        }, {
		            // Опции.
		            // Необходимо указать данный тип макета.
		            iconLayout: 'default#image',
		            // Своё изображение иконки метки.
		            iconImageHref: '../sites/all/themes/tihiy/img/icons/map-pin.svg',
		            // Размеры метки.
		            iconImageSize: [40, 67],
		            // Смещение левого верхнего угла иконки относительно
		            // её "ножки" (точки привязки).
		            iconImageOffset: [-20, -75]
		        });

		    myMap.geoObjects.add(myPlacemark);
		    myMap.behaviors.disable('scrollZoom');
		});
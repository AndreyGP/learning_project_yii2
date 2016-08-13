/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/


$(document).ready(function(){
	$('#res').hide();

	$("#jRate").jRate({
		rating: 4.0	, //По умолчанию рейтинг
		shape: 'STAR',//STAR, FOOD, TWITTER, BULB, RECTANGLE, CIRCLE, RHOMBUS, TRIANGLE.
		shapeGap: '10px',//Правый отступ
		minSelected: 3,//Минимально допустимая оценка
		precision: 0.5,//Шаг в оценке
		width: 30,//Ширина
		height: 30,//высота
		startColor: 'yellow',//Начинается с цвета
		endColor: 'green',//Заканчивается цветом
		min: 1,//Минимальная на первой звезде
		max: 5,//Максимальная на последней
		onChange: function(rating) {
			$('#demo-onchange-value').after().text("Ваша оценка: "+rating);
		},
		onSet: function(rating) {
			var id = $('#jRate').data('id');
			var ip = $('#jRate').data('ip');
			$.ajax({
				url: '/product/rait',
				type: 'GET',
				data: {id: id, rait: rating, ip: ip},
				success: function (res) {
					if (!res) alert('Error!');
					$('#noRes').hide();
					$('#jRate').hide();
					$('#res')
						.show()
						.html("<span style=\"color: red\">Благодарим за Вашу оценку:</span> <b style=\"color: green\">"+rating+"</b>");

				},
				error: function () {
					alert('Error!!!');
				}
			});

		}
	});

	CloudZoom.quickStart();

	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	$('.cat_menu').dcAccordion({
		speed: 200
	});

	function showCart(cart)
	{
		$('#cart .modal-body').html(cart);
		$('span.cart_badge').html('!');
		$('#cart').modal();
	}
	function showCartClear(cart)
	{
		$('#cart .modal-body').html(cart);
		$('span.cart_badge').html('');
		$('#cart').modal();
	}

	function showNoCart(){
		$('#cartNo').modal();
	}
	function showYesCart(cart)
	{
		$('#cart .modal-body').html(cart);
		$('#cart').modal();
	}
	
	$('#clearCart').on('click', function (){
		$.ajax({
			url: '/cart/clear',
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCartClear(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	});


	$('.add-to-cart').on('click', function (e) {
		e.preventDefault();

		var id = $(this).data('id');
		$.ajax({
			url: '/cart/add',
			data: {id: id},
			type: 'GET',
			success: function(res){
				if (!res) alert('Ошибка');
				showCart(res);
			},
			error: function () {
				alert('Error!!!');
			}
		});
	});

	$('.qty_prod').on('click', function (e) {
		e.preventDefault();

		var id = $(this).data('id');
		var qty = $('#qty_prod').val();
		$.ajax({
			url: '/cart/add',
			data: {id: id, qty: qty},
			type: 'GET',
			success: function(res){
				if (!res) alert('Ошибка');
				showCart(res);
			},
			error: function () {
				alert('Error!!!');
			}
		});
	});

	$('#cart .modal-body').on('click', '.del-item',function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			url: '/cart/delete',
			data: {id: id},
			type: 'GET',
			success: function (res) {
				if (!res) alert('Ошибка');
				showCart(res);
			},
			error: function () {
				alert('Error!!!');
			}
		});
	});

	$('#cart .modal-body').on('click', '.cart_quantity_up',function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		var up = 'up';
		$.ajax({
			url: '/cart/recalc',
			data: {id: id, action: up},
			type: 'GET',
			success: function (res) {
				if (!res) alert('Ошибка');
				showCart(res);
			},
			error: function () {
				alert('Error!!!');
			}
		});
	});

	$('#cart .modal-body').on('click', '.cart_quantity_down',function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		var down = 'down';
		$.ajax({
			url: '/cart/recalc',
			data: {id: id, action: down},
			type: 'GET',
			success: function (res) {
				if (!res) alert('Ошибка');
				showCart(res);
			},
			error: function () {
				alert('Error!!!');
			}
		});
	});

	$('#cartOn').on('click', function (e) {
		e.preventDefault();
		$.ajax({
			url: '/cart/show',
			type: 'GET',
			success: function(res){
				if (!res){
					showNoCart();
				}else{
					showYesCart(res);
				}
			},
			error: function () {
				alert('Error!!!');
			}
		});
	});
});

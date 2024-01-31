$(document).ready(function() {
	
    var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#usapostile-offcanvas, .js-usapostile-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-usapostile-nav-toggle').removeClass('active');
				
	    	}
	    
	    	
	    }
		});

	};


	var offcanvasMenu = function() {

		$('#page').prepend('<div id="usapostile-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-usapostile-nav-toggle usapostile-nav-toggle usapostile-nav-white"><i></i></a>');
		var clone1 = $('.menu-1 > ul').clone();
		$('#usapostile-offcanvas').append(clone1);
		var clone2 = $('.menu-2 > ul').clone();
		$('#usapostile-offcanvas').append(clone2);

		$('#usapostile-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#usapostile-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);

			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');				
		}).mouseleave(function(){

			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');				
		});


		$(window).resize(function(){

			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-usapostile-nav-toggle').removeClass('active');
				
	    	}
		});
	};


	var burgerMenu = function() {

		$('body').on('click', '.js-usapostile-nav-toggle', function(event){
			var $this = $(this);


			if ( $('body').hasClass('overflow offcanvas') ) {
				$('body').removeClass('overflow offcanvas');
			} else {
				$('body').addClass('overflow offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();

		});
	};
    offcanvasMenu();
    burgerMenu();
        //  $(document).click(function () {
        //      $(".dropdown-menu").hide();
        //  });
        $('.dropdown-link').click(function(event) {
            event.stopPropagation();
            console.log("hi");
			$(".dropdown-menu").hide();
			$(this).parent('.link').siblings().find(".dropdown-menu").fadeOut();
            $(this).parent('.link').find(".dropdown-menu").fadeToggle();
        })
        $('.dropdown-menu').click(function(e){
            e.stopPropagation(); 
        })
		$(".navbar-toggler").click(function(){
			$('.navbar-collapse ').slideToggle();
		})
		$('#rdCredit').on('click', function () {
			console.log("fff");
		   if ($(this).is(':checked')) {
			   $(".checkContent").hide();
			   $(".rdCredit").show();
		   }
		 });
		 $('#rdBillirdBilling').on('click', function () {
			console.log("fff");
		   if ($(this).is(':checked')) {
			   $(".checkContent").hide();
			   $(".rdBillirdBilling").show();
		   }
		 });
		 $('#rdCheck').on('click', function () {
			console.log("fff");
		   if ($(this).is(':checked')) {
			   $(".checkContent").hide();
			   $(".rdCheck").show();
		   }
		});
		$('.dropdown-link2').click(function(event) {
            event.stopPropagation();
            console.log("hi");

            $(this).parent('.link').find(".dropdown-menu2").fadeToggle();
        })

	// Ahmed edit
	$(".sup-menu ").click(() =>{
		$(".sup-menu-items").toggle()
	})
	if ($(".creditCardForm")) {
		let cardName = $("#owner-of22")
		let cardNum = $("#card-number-of22")
		let cardCvv = $("#cvv-of22")
		let cardMonth = $("#month-of22")
		let cardYear = $("#year-of22")

		cardName.keyup(function() {
			$("#name-card").html(cardName.val());
		});
		cardNum.keyup(function() {
			$("#num-card").html(cardNum.val());
		});
		// cardCvv.keyup(function() {
		// 	$("#cvv-card").html(cardName.val());
		// });
		cardMonth.change(function() {
			$("#month-card").html(cardMonth.val());
		});
		cardYear.change(function() {
			$("#year-card").html(cardYear.val());
		});
	}
});
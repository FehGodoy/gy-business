$(document).ready(function () {
	// Navbar mobile
	function openNavbar() {
		$("#navbarNav").css({
			transform: "translateX(0%)",
			height: "100%",
		});
		$(".navbar-expand-lg .navbar-toggler").hide();
		$("#close").css({
			opacity: 1,
			visibility: "visible",
			position: "fixed",
			right: "9%",
			"z-index": "999",
			top: "22px",
		});
	}

	function closeNavbar() {
		$("#navbarNav").css({
			transform: "translateX(100%)",
			height: "100%",
		});
		$("#close").css({
			opacity: 0,
			visibility: "hidden",
		});
		$(".navbar-expand-lg .navbar-toggler").css({
			display: "block",
			position: "absolute",
			right: "30px",
		});
	}

	if ($(window).width() < 991) {
		$(".navbar-expand-lg .navbar-toggler").click(openNavbar);
		$("#close").click(closeNavbar);
	}
	// Seção cases
	$("section.cases .owl-carousel").owlCarousel({
		stagePadding: 50,
		loop: true,
		margin: 15,
		nav: false,
		autoplay: true,
		autoplayTimeout: 7000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 3,
			},
			1000: {
				items: 4,
			},
		},
	});
	// Seção feedbacks
	$("section.feedbacks .owl-carousel").owlCarousel({
		stagePadding: 50,
		margin: 25,
		nav: false,
		dots: false,
		loop: true,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 3,
			},
			1000: {
				items: 3,
			},
		},
	});
	// Cases relacionados
	$("section.relacionados .owl-carousel").owlCarousel({
		stagePadding: 20,
		margin: 25,
		nav: false,
		dots: false,
		loop: false,
		autoplay: true,
		autoplayTimeout: 7000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 3,
			},
			1000: {
				items: 3,
			},
		},
	});
	// Adiciona um manipulador de eventos de clique para a div .boxTipoFiltro
	$(" section.content .boxTipoFiltro").on("click", function () {
		// Altera a classe 'rotated' da div .iconeFiltro para aplicar a rotação de 180 graus
		$(" section.content .iconeFiltro").toggleClass("rotated");

		// Alterna o display da div .conteudoFiltro entre 'block' e 'none'
		$(" section.content .conteudoFiltro").toggle();
	});

	// FILTRO PAGE ARCHIVE
	var colunagemProdExpanded = true;

	function toggleColunagemProd() {
		if (colunagemProdExpanded) {
			$("#colunagemProd").removeClass("col-md-12").addClass("col-md-9");
		} else {
			$("#colunagemProd").removeClass("col-md-9").addClass("col-md-12");
		}

		colunagemProdExpanded = !colunagemProdExpanded;
		$("#colunagemFiltro").toggle();
	}

	$(".buttonFilterActive").on("click", function () {
		toggleColunagemProd();
	});

	$("main section.content #colunagemFiltro .boxAllFiltros .iconeClose").click(
		function () {
			toggleColunagemProd();
		}
	);
	// ANIMAÇÃO DE ROLAGEM PÁGINA INICIAL
	ScrollReveal().reveal(".scrollReveal", { delay: 500 });

	// Inicializa o MixItUp

	// Adiciona um manipulador de eventos de clique para os botões de filtro
	$("main section.content #colunagemFiltro .conteudoFiltro ul li").on(
		"click",
		function () {
			var mixer = mixitup("#colunagemProd .boxPosts .row");
			// Remove a classe 'active' de todos os botões
			$(
				"main section.content #colunagemFiltro .conteudoFiltro ul li"
			).removeClass("active");
			// Adiciona a classe 'active' ao botão clicado
			$(this).addClass("active");

			// Obtém o filtro do botão clicado com base no atributo 'data-filter'
			var filterValue = $(this).attr("data-filter");

			// Filtra os itens do portfólio com base no filtro
			mixer.filter(filterValue);
		}
	);
	// FILTRO PAGE ARCHIVE
});

function newsSlider() {
	var numeroLiPoint = $(".news_slider li").size();
	var largLi = $(".news_slider li").height()+421;
	var largLiTot = numeroLiPoint*largLi;
	var termina = largLiTot-largLi;

	//larghezza dinamica dell'ul
	var boxUl = $(".news_slider ul.slides");
	boxUl.css("height",largLiTot);

	$('.news_slider-right').bind('click', moveBox1);
	function moveBox1(e1) {
	e1.preventDefault();
		$('.news_slider-right').unbind();
		if(boxUl.css("top")!=-termina+"px"){
			boxUl.stop().animate({top:"-="+largLi+"px"}, {
			duration: 500,
			complete: function() {
				$('.news_slider-right').bind('click', moveBox1);
				palliniInversa();
			}
		  });
		}
		else {
			$('.news_slider-right').bind('click', moveBox1);
		}
	}

	$('.news_slider-left').bind('click', moveBox2);
	function moveBox2(e2) {
	e2.preventDefault();
		$('.news_slider-left').unbind();
		if(boxUl.css("top")!="0px"){
			boxUl.stop().animate({top:"+="+largLi+"px"}, {
			duration: 500,
			complete: function() {
				$('.news_slider-left').bind('click', moveBox2);
				palliniInversa();
			}
		  });
		}
		else {
			$('.news_slider-left').bind('click', moveBox2);
			}
	}


	//creazione pallini
	for(i=0; i<numeroLiPoint; i++){
		$(".news_slider-spots").append("<li></li>");
	}
	//calcolo dinamico larghezza contenitore pallini
	var largPallini = $(".news_slider-spots li").width();
	$(".news_slider-spots").width(largPallini*numeroLiPoint);

	$(".news_slider-spots li:eq(0)").addClass("active");

	//spostamento dello slider al click sul pallino
	$(".news_slider-spots li").click(function(){
		$(".news_slider-spots li").removeClass("active");
		$(this).addClass("active");
		var indicePallini = $(".news_slider-spots li").index(this);
		boxUl.stop().animate({top:0-(indicePallini*largLi)}, {duration: 500});

		//sicurezza
		$('.news_slider-left').bind('click', moveBox2);
		$('.news_slider-right').bind('click', moveBox1);
	});

	function palliniInversa() {
		var boxLeft = parseInt(boxUl.css("top"));
		var indexPal = parseInt(-boxLeft/largLi);
		$(".news_slider-spots li").removeClass("active");
		$(".news_slider-spots li").eq(indexPal).addClass("active");
	}
}

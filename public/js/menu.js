$(".submenu").click(function(){
	$(this).children("ul").slideToggle();
})

$("ul").click(function(p){
	p.stopPropagation();
})

$(".subsubmenu").click(function(){
	$(this).children("ol").slideToggle();
})

$("ol").click(function(o){
	o.stopPropagation();
})
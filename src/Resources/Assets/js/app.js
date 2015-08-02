$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }


	$.ajaxSetup({data:{csrf_token:$('meta[name="csrf-token"]').attr("content")}});

	$(document).on('click','a',function(a){if($(this).attr('href')=='#'){return false}});
	$(document).on('click','.modalfy',function(a){a.preventDefault();modalfyRun(this,$(this).attr('href'))});

	$('.delete').click(function(e) {
		e.preventDefault();
		if(confirm(LNG_ARE_YOU_SURE)) {
		  $('<form method="POST" style="display:none"><input type="hidden" name="_method" value="DELETE" /><input type="hidden" name="_token" value="'+ $('meta[name="csrf-token"]').attr("content") +'"></form>')
			.insertAfter($(this))
			.attr({
			  action: $(this).attr('href')
			}).submit();
		}
	});

});

function modalfyRun(e,t){$.ajax({type:"GET",url:t}).done(function(e){if(e){$("#site-modal").html(e).modal({backdrop:'static'})}else{console.log(e);bootbox.alert(lang_unable_to_exec)}}).fail(function(e,t){console.log(e);bootbox.alert(lang_unable_to_exec+t)})}
function throttle(b,a){var c=null;return function(){var e=this,d=arguments;clearTimeout(c);c=window.setTimeout(function(){b.apply(e,d)},a||500)}};

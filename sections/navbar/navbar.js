jQuery(document).ready(function(){var a=1;jQuery(".pldrop").find("ul").each(function(){jQuery(this).addClass("dropdown-menu");var b="";if(jQuery(this).siblings("a").children(".caret").length===0){b=' <b class="caret" />';}jQuery(this).siblings("a").addClass("dropdown-toggle").attr("href","#m"+a).attr("data-toggle","dropdown").append(b).parent().attr("id","m"+a++).addClass("dropdown");});jQuery(".dropdown-toggle").dropdown();});
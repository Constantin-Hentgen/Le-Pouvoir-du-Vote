window.onscroll = function() {scroll()};

function scroll() {
	var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
	var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
	var scrolled = (winScroll / height) * 100;
	document.getElementById("myBar").style.width = scrolled + "%";
	
	if (scrolled<2){
		document.getElementById("homy").style.display = "block";
		document.getElementById("progress-container").style.display = "none";
	}

	if (scrolled>=2){
		document.getElementById("progress-container").style.display = "block";
		document.getElementById("homy").style.display = "none";
	}

	if (scrolled>98){
		document.getElementById("homy").style.display = "block";
		document.getElementById("progress-container").style.display = "none";
	}
}
//texte
function hideforlanguages() {
	document.getElementById("languagemenu").style.display = "flex";
	document.getElementById("languages").style.display = "none";
	document.getElementById("title").style.display = "none";
	document.getElementById("menu").style.display = "none";
}

function hideformenu() {
	document.getElementById("mainmenu").style.display = "flex";
	document.getElementById("languages").style.display = "none";
	document.getElementById("title").style.display = "none";
	document.getElementById("menu").style.display = "none";
}

function hideformenuhistory() {
	document.getElementById("mainmenu").style.display = "flex";
	document.getElementById("Histoire").style.display = "none";
	document.getElementById("header").style.display = "none";
	document.getElementById("body").style.height = "100%";
	document.getElementById("html").style.height = "100%";
}

function hideformenuinfo() {
	document.getElementById("mainmenu").style.display = "flex";
	document.getElementById("Histoire").style.display = "none";
	document.getElementById("header").style.display = "none";
	document.getElementById("html").style.height = "100%";
}


function hideformenusurvey() {
	document.getElementById("mainmenu").style.display = "flex";
	document.getElementById("questionnaire").style.display = "none";
	document.getElementById("header").style.display = "none";
	document.getElementById("html").style.height = "100%";
}

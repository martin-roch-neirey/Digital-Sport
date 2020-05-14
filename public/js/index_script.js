function goToAcc(){
	var element = document.getElementById("partie1");
	element.scrollIntoView({behavior: "smooth"});
}

function goToEntmnt(){
	var element = document.getElementById("partie2");
	element.scrollIntoView({behavior: "smooth", block: "center"});
}

function goToAbo(){
	var element = document.getElementById("partie3");
	element.scrollIntoView({behavior: "smooth", block: "center"});
}
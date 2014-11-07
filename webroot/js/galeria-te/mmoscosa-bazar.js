$(function() {
	var pathname, url, lastelement, pivot;
    pathname = window.location.pathname;
    url = pathname.split("/");
    pivot = url[url.length-2];
    lastelement = url[url.length-1];
    if(pivot == 'unique'){
    	$('#'+lastelement).click();
    }
});

function findSubcateory (subcategories, url) {
	var isHere;
	isHere = false;

	$.each(url, function(index, value){
		if(value.length <= 0){return true;}
		$.each(subcategories, function(key, subcategory){
			if(value == subcategory){
				isHere = subcategory;
			}
		});
	});

	return isHere;
}


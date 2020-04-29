function hideAllPages(){
	Array.from(document.getElementsByClassName('page')).forEach(function(page){ 
		page.classList.add('d-none');
	});
}
function showPage(pageName) {
	const page = document.getElementById(pageName);
	if(page){
		page.classList.remove('d-none');
	}
}


window.addEventListener("hashchange", function(){
	console.log(location.hash);
	
	
	hideAllPages();
	
	showPage(location.hash.substr(1));
	
});


function getTemplate() {

fetch('test.html', {mode: 'no-cors'})
  .then((response) => {
    return response.text();
  })
  .then((data) => {
    console.log(data);
  });
}
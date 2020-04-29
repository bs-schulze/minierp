<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="scripts/spa.js" ></script>

<script >
//import {DataTable} from "/scripts/ext/simple-datatables"

class Product {
	id;
	product_name;
}
function getAjax(uri) {
    fetch(uri).then(function (response) {
        return response.json();
    });
}


fields = [
	{name: 'id', field: 'id'},
	{name: 'Name', field: 'product_name'},
];
	

function renderTable(options) {
	data = options.data;
	
	rowClick = doubleClick;
	

	const table = document.getElementById(options.tableId);
	table.innerHTML = '';
	
	const tableHead = table.appendChild(document.createElement('thead'));
	const tableBody = table.appendChild(document.createElement('tbody'));
	
	let tableHeadHtml = '';
	let tableBodyHtml = '';
	options.fields.forEach(function(field, index){
		tableHeadHtml += '<th>'+ field.name +'</th>';
	});
	tableHeadHtml = '<tr>' + tableHeadHtml + '</tr>';
	tableHead.innerHTML = tableHeadHtml;
	
	data.forEach(function(row, index){

		tableBodyHtml='';
		options.fields.forEach(function(field, index){

			tableBodyHtml += '<td>'+ row[field.field] +'</td>';
		});
		
		let trElement = document.createElement('tr');
		trElement.innerHTML = tableBodyHtml;
		trElement.setAttribute('data-index', index);
		tableBody.appendChild(trElement);
		
		
	});
	
	
	Array.from(tableBody.getElementsByTagName('tr')).forEach(function(element){ 
		element.addEventListener('click', rowClick);
	});
	//let dataTable = new DataTable('#'+options.tableId);
}

function doubleClick(event){
	const index = event.target.parentElement.getAttribute('data-index');
	console.log(productList[index]);
	document.getElementById('id').value = productList[index].id;
	document.getElementById('product_name').value = productList[index].product_name;
	$('#product-tabs a:last').tab('show');
	$('#product-tabs a:last').text('Artikel: ' + productList[index].id + ' / ' +productList[index].product_name);
	
}

function generateForm(options){
	const element = document.getElementById(options.elementId)
	let formHtml = '';
	options.fields.forEach(function(field, index){
	
		let formField = '';
		formField += '<div class="form-group">';
		formField += '<label for="'+field.field+'">'+field.name+'</label>';
		formField += '<input type="text" class="form-control" id="'+field.field+'" name="'+field.field+'" >';
		formField += '</div>';
		formHtml += formField;
	});
	formHtml = '<form>' + formHtml + '</form>';
	
	element.innerHTML = formHtml;
	
}
</script>

</head>

<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-2">
			<ul class="nav flex-column">
				<li class="nav-item"><a href="#products" class="nav-item">Produkte</a></li>
				<li class="nav-item"><a href="#bestellungen" class="nav-item">Bestellungen</a></li>
				<li class="nav-item"><a href="#invoice" class="nav-item">Rechnungen</a></li>
				<li class="nav-item"><a href="#lieferscheine" class="nav-item">Lieferscheine</a></li>
				<li class="nav-item"><a href="#customer" class="nav-item">Kunden</a></li>
				<li class="nav-item"><a href="#lieferanten" class="nav-item">Lieferanten</a></li>
				<li class="nav-item"><a href="#hersteller" class="nav-item">Hersteller</a></li>
			</ul>
		</div>
		<div class="col-md-10 col-sm-12">
			<div id="products" class="page">
				<div class="datatable">
				</div>
				
				<ul class="nav nav-tabs" id="product-tabs" role="tablist">
				  <li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Produktliste</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="productform-tab" data-toggle="tab" href="#productform-tabs-content" role="tab" aria-controls="profile" aria-selected="false">
					Produktformular
					</a>
				  </li>
				  
				</ul>
				<div class="tab-content" id="product-tabs-content">
				  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<table class="table table-striped " id="producttable">
						</table>
				  </div>
				  <div class="tab-pane fade" id="productform-tabs-content" role="tabpanel" aria-labelledby="productform-tab">
					<div class="productform" id="testdiv"></div>
				  </div>
				  
				</div>
				
				
					
					
				</div>
			<div id="invoice" class="page ">
				<h1>Rechnungen</h1>
				<form>
					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label for="address1">Addresse1</label>
								<select class="form-control" id="address1">
								  <option>Addmore</option>
								  <option>Franz Peter</option>
								  <option>Simon Keller</option>
								  <option>Class Relozius</option>
								  <option>Danny Becker</option>
								</select>
							</div>
							
						</div>
						<div class="col-md">
							<div class="form-group">
								<label for="address2">Addresse2</label>
								<select class="form-control" id="address2">
								  <option>byte-solution</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								  <option>5</option>
								</select>
							</div>
						</div>
					</div>
					
					<div>
					
						<table class="table">
							<thead>
							<tr>
								<th>Menge</th>
								<th>Bezeichnung</th>
								<th>Gesamt</th>
								<th>Netto</th>
								<th>Brutto</th>
								<th>Steuer</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1</td>
								<td>LEGO 60154 Busbahnhof</td>
								<td>69,99</td>
								<td>55,12</td>
								<td>69,99</td>
								<td>19,0%</td>
							</tr>
							</tbody>
						</table>
						<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#productmodal">+ add</button>
						<div class="modal" id="productmodal" tabindex="-1" role="dialog">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title">Produkt</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								<p>Produktauswahl</p>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-primary">add</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							  </div>
							</div>
						  </div>
						</div>
					</div>
				</form>
			</div>
			<div id="customer" class="page">
			<h1>Kunden</h1>
			
			<form>
				<div class="form-group">
					<label for="salutation">salutation</label>
					<select class="form-control" id="salutation">
					  <option>Herr</option>
					  <option>Frau</option>
					  <option>Firma</option>
					  <option>Dr</option>
					  <option>Sonstige</option>
					</select>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="name1">Name1</label>
							<input type="text" name="name1" id="name1" class="form-control">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="name2">Name2</label>
							<input type="text" name="name2" id="name2" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-9">
						<div class="form-group">
							<label for="street1">Street1</label>
							<input type="text" name="street1" id="street1" class="form-control">
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label for="houseno">Houseno</label>
							<input type="text" name="houseno" id="houseno" class="form-control">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-3">
						<div class="form-group">
							<label for="zipcode">Zipcode</label>
							<input type="text" name="zipcode" id="zipcode" class="form-control">
						</div>
					</div>
					<div class="col-9">
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" name="city" id="city" class="form-control">
						</div>
					</div>
				</div>

			</form>
			</div>
		</div>
	</div>

</div>

<script>
hideAllPages();
showPage(location.hash.substr(1));
const productList = [];
fetch('http://bricksale.localhost:7090/api/product/list').then(function (response) {
        return response.json();
    }).then(function(data){
    const options = {
        fields: fields,
        data: data.data,
        tableId: 'producttable',
        elementId: 'testdiv'
    }

    

    data.data.forEach(function(element){
        const tempProduct = new Product();
        tempProduct.id = element.id;
        tempProduct.product_name = element.product_name;
        productList.push(tempProduct);

    });

    renderTable(options);
    generateForm(options);
});

//console.log(getAjax('http://bricksale.localhost:7090/api/product/list'))
/*
then(function(data){
    const options = {
        fields: fields,
        data: data.data,
        tableId: 'producttable',
        elementId: 'testdiv'
    }
    renderTable(options);
});
*/
//generateForm(options);








function addTab(name){
	var tabLink = '<li class="nav-item"><a class="nav-link" id="'+name+'-tab" data-toggle="tab" href="#'+name+'" role="tab" aria-controls="'+name+'" aria-selected="false">'+name+'</a></li>';
	document.getElementById('product-tabs').innerHTML +=tabLink;
	var tabContent = '<div class="tab-pane fade" id="'+name+'" role="tabpanel" aria-labelledby="'+name+'-tab">as</div>';
	document.getElementById('product-tabs-content').innerHTML += tabContent;
	
}

</script>
</body>

</html>
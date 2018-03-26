$(document).ready(function(){
		/* Smooth scroll vers le champ newsletter */
		$("a[name='Newsletter']").click(function(event){
    	    event.preventDefault();
	        var position = $("#inputNewsletter").offset().top; 
	        $('body,html').animate({scrollTop: position}, 900);
	    });
		
		/* Affiche un message apres s'etre enregistré a la newsletter */
		$('#btnNewsletter').click(function(event){
	        event.preventDefault();
	        $.ajax({
	        	type:'post',
	        	url:'/newsletter',
	        	data:{email:$('#inputNewsletter').val()}
	        }).done(function(result){
	        	$('#inputNewsletter').html(result);	
	        	$(".newsletterSucces").append("<p>Email address registered</p>");
	        });
	    });

		/* Ajoute un produit dans le panier en récuperant son ID */
		$('.addToCaddie').click(function(event){
			event.preventDefault();
			let $id = $(this).attr("data-product_id");
			$.ajax({
				type: 'post',
				url: `/products/caddie/add/${$id}`,
				dataType: 'json'
			}).done(function(result){
				$('#listProduct').html(result.result);
				$('#quantiteCaddie').html(result.quantite);
				$('#totalCaddie').html(result.prix);
			});
		}); 

		/* Recharge tout le panier des qu'un article y es ajouté */
		$.ajax({
			type: 'post',
			url: '/products/caddie/card',
			dataType: 'json'
			}).done(function(result){
				$('#listProduct').html(result.result);
				$('#quantiteCaddie').html(result.quantite);
				$('#totalCaddie').html(result.prix);
			});

		/* Permet de modifier la quantité d'un produit sur la page card ou checkout via le bouton "recalculate" */
		$('.editProductCaddie').click(function(event){
			event.preventDefault();
			let $id = $(this).attr("data-product_id");
			let $qty = $('#inputEditProduct_' + $id).val();
			$.ajax({
				type: 'post',
				url: `/products/caddie/edit/${$id}`,
				dataType: 'json',
				data: {qty:$qty}
			}).done(function(result){
				location.reload();
			});
		});
		
		/* Supprime un element du caddie */
		$('.removeProductCaddie').click(function(event){
			event.preventDefault();
			let $id = $(this).attr("data-product_id");
			$.ajax({
				type: 'post',
				url: `/products/caddie/remove/${$id}`,
				dataType: 'json'
			}).done(function(result){
				location.reload();
			});
		});
		
		/* Ajoute un produit tout en ajustant sa quantité via la page de l'article */
		$('#addToCaddie').click(function(event){
			event.preventDefault();
			let $id = $(this).attr("data-product_id");
			let $qty = $('#inputEditProduct').val();
			$.ajax({
				type: 'post',
				url: `/products/caddie/add/${$id}`,
				dataType: 'json',
				data: {qty:$qty}
			}).done(function(result){
				$('#listProduct').html(result.result);
				$('#quantiteCaddie').html(result.quantite);
				$('#totalCaddie').html(result.prix);		
			});
		});
});
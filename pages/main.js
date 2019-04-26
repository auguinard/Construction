(function($){

   $('.addPanier').click(function(event){
   	event.preventDefault();
   	$.get($(this).attr('href'),{},function(data){
      if (data.error) {
      	alert(data.message);
      }else{
      	if(confirm(data.message + 'voulez-vous voir les details ?')){
      		location.href = 'panier.php';
      	}else{
           $('#total').empty().append(data.total);
           $('#count').empty().append(data.count);
      	}
      }
   	},'json');
   	return false;
   })

})(jQuery);
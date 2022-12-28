
$(document).ready(function(){
	$("body").delegate(".remove","click",function(event){
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(this).attr("remove_id");
		$.ajax({
			url	:	"delete_order",
			method	:	"POST",
			data	:	{removeItem:1,rid:remove_id},
			success	:	function(data){
				$("#showcart").html(data);
				window.setTimeout(function(){window.location.reload()},10)
			}
		})
	})
	$('.inc').click(function(){
		var product_id = $(this).attr('product_id');
		var qty1 = $("#qty-"+product_id).val();
		var total_count = parseInt(qty1) + 1;
		$("#qty-"+prod_id).val(total_count);
											
		var row = $("#qty-"+product_id).parent().parent();
		var price = row.find(".price").val();
		var quantity = row.find(".quantity").val();
		var update_id = row.find(".quantity").attr("update_id");
		if (isNaN(qty)) {
			quantity = 1;
		};
		if (quantity < 1) {
			quantity = 1;
		};
		var total = price * quantity;
		$(".total-"+product_id).val(total);
		$(".total-"+product_id).html('&#x20B1 ' +total+'.00');
		$(".cartqty-"+product_id).html(quantity +'x');
								
		$.ajax({
			url	:	"update_order",
			method	:	"POST",
			data	:	{updateItem:1,update_id:update_id,qty:qty, total:total},
			success	:	function(data){
				$(".total_amt").html('&#x20B1 ' +data+'.00');
				$("#total_amt").val(data);
													
				var delivery = $("#deliverycost").val();
				var t_amt = $("#total_amt").val();
				if(delivery == 0){
					$("#total_order").html('');
					$("#totalorder").val(0);
					
				}else{
					var total = parseInt(delivery) + parseInt(t_amt);
					$("#total_order").html('&#x20B1 ' +total+'.00');
					$("#totalorder").val(total);
					
				}
			}
		});
	});
	$('.dec').click(function(){
		var product_id = $(this).attr('product_id');
		var qty1 = $("#qty-"+prod_id).val();
		if(parseInt(qty1) > 1){
			var total_count = parseInt(qty1) - 1;
			$("#qty-"+product_id).val(total_count);
		}else{
			var total_count = 1;
			$("#qty-"+product_id).val(total_count);
		}
		
		
											
		var row = $("#qty-"+prod_id).parent().parent();
		var price = row.find(".price").val();
		var qty = row.find(".qty").val();
		var update_id = row.find(".qty").attr("update_id");
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		$(".total-"+prod_id).val(total);
		$(".total-"+prod_id).html('&#x20B1 ' +total+'.00');
		$(".cartqty-"+prod_id).html(qty +'x');
											
		$.ajax({
			url	:	"update_order",
			method	:	"POST",
			data	:	{updateItem:1,update_id:update_id,qty:qty, total:total},
			success	:	function(data){
				$(".total_amt").html('&#x20B1 ' +data+'.00');
				$("#total_amt").val(data);
													
				var delivery = $("#deliverycost").val();
				var t_amt = $("#total_amt").val();
				if(delivery == 0){
					$("#total_order").html('');
					$("#totalorder").val(0);
				}else{
					var total = parseInt(delivery) + parseInt(t_amt);
					$("#total_order").html('&#x20B1 ' +total+'.00');
					$("#totalorder").val(total);
				}						
			}
		});
	});
	$('.checked').click(function(){
		var prod_id = $(this).val();
		$.ajax({
			url	:	"check_order",
			method	:	"POST",
			data	:	{prod_id:prod_id},
			success	:	function(data){
				$('#CheckProd').html(data);
				var row = $("#qty-"+prod_id).parent().parent();
				var price = row.find(".price").val();
				var qty = row.find(".qty").val();
				var update_id = row.find(".qty").attr("update_id");
				if (isNaN(qty)) {
					qty = 1;
				};
				if (qty < 1) {
					qty = 1;
				};
				var total = price * qty;
				$(".total-"+prod_id).val(total);
				$(".total-"+prod_id).html('&#x20B1 ' +total+'.00');
				$.ajax({
					url	:	"update_order",
					method	:	"POST",
					data	:	{updateItem:1,update_id:update_id,qty:qty, total:total},
					success	:	function(data){
						if(data != 0){
							$(".total_amt").html('&#x20B1 ' +data+'.00');
							$("#total_amt").val(data);
						}else{
							$(".total_amt").html('');
							$("#total_amt").val(data);
						}
						$.ajax({
							url	:	"get_additional",
							method	:	"POST",
							data	:	{},
							success	:	function(data){
								$("#addtion").val(data);
								$.ajax({
									url: "check_cart",
									method	:	"get",
									data	:	{},
									success	:	function(data){
										var addtion =$("#addtion").val();
										var costs = parseInt(data) + parseInt(addtion);
										if(costs == 0  || costs =='' ||  isNaN(costs)){
											$("#delivery_cost").html('Not Available');
											$("#deliverycost").val(0);
										}else{
											$("#delivery_cost").html('&#x20B1 ' +costs+'.00');
											$("#deliverycost").val(costs);
										}
										
										var delivery = $("#deliverycost").val();
										var t_amt = $("#total_amt").val()
										var total = parseInt(delivery) + parseInt(t_amt);
										
										if(delivery == 0){
											$("#total_order").html('');
											$("#totalorder").val(0);
											if(t_amt == 0 || t_amt == ''){
												$('#submit').attr('disabled', true)
												$('#submit').removeAttr('href')
											}else{
												$('#submit').attr('href', "checkout")
												$('#submit').removeAttr('disabled')
											}
											
										}else{
											
											$("#total_order").html('&#x20B1 ' +total+'.00');
											$("#totalorder").val(total);
											$('#submit').attr('href', "checkout")
											$('#submit').removeAttr('disabled')
										}
									}
							});	
						}
					});
				}
			});
		}
	});
});
$('.checked_all').change(function(){
	var store_id = $(this).val();
	var checked = $(this).is(':checked');
	if(checked){
		$(".checked"+store_id).each(function(){
			$(this).prop('checked', true)
			$.ajax({
				url	:	"check_all_order",
				method	:	"POST",
				data	:	{store_id:store_id},
				success	:	function(data){
					$('#CheckProd').html(data);
					$.ajax({
						url	:	"get_additional",
						method	:	"POST",
						data	:	{},
						success	:	function(data){
							$(".addtion").val(data);
							$.ajax({
								url: "check_cart",
								method	:	"get",
								data	:	{},
								success	:	function(data){
									var addtion =$(".addtion").val();
									var costs = parseInt(data) + parseInt(addtion);
									if(costs == 0  || costs =='' || isNaN(costs)){
										$("#delivery_cost").html('Not Available');
										$("#deliverycost").val(0);
									}else{
										$("#delivery_cost").html('&#x20B1 ' +costs+'.00');
										$("#deliverycost").val(costs);
									}
									
										$.ajax({
											url: "t_amt",
											method: "POST",
											data:{},
											success: function(data){
												if(data == 0){
													$(".total_amt").html('');
													$("#total_amt").val(data);
												}else{
													$(".total_amt").html('&#x20B1 ' +data+'.00');
													$("#total_amt").val(data);
													
													var delivery = $("#deliverycost").val();
													var total = parseInt(delivery) + parseInt(data);
													
													if(delivery == 0){
													
														$("#total_order").html('');
														$("#totalorder").val(0);
														if(data == 0 || data == ''){
															$('#btn_checkout').html("<a type='submit' class='btn' id='submit' style='width:100%; background:#ff9100; color:#fff; font-size:22px'  name='submit' value='' disabled ><b>Proceed to Checkout</b></a>");
														}else{
															$('#submit').href = "<?=site_url('user/checkout')?>";
															$('#submit').removeAttr('disabled')
														}
													}else{
														$("#total_order").html('&#x20B1 ' +total+'.00');
														$("#totalorder").val(total);
														$('#submit').href = "<?=site_url('user/checkout')?>";
														$('#submit').removeAttr('disabled')
													}
												}
												
												
												
											}
										})	
								}
							});	
						}
					});
				}
			});
		});
		}else {
			$(".checked"+store_id).each(function(){
				$(this).prop('checked', false)
				$.ajax({
					url	:	"uncheck_all_order",
					method	:	"POST",
					data	:	{store_id:store_id},
					success	:	function(data){
						$('#CheckProd').html(data);
						$.ajax({
							url	:	"get_additional",
							method	:	"POST",
							data	:	{},
							success	:	function(data){
								$(".addtion").val(data);
								$.ajax({
									url: "check_cart",
									method	:	"get",
									data	:	{},
									success	:	function(data){
										var addtion =$(".addtion").val();
										var costs = parseInt(data) + parseInt(addtion);
										
										if(costs == 0  || costs =='' || isNaN(costs)){
											$("#delivery_cost").html('Not Available');
											$("#deliverycost").val(0);
										}else{
											$("#delivery_cost").html('&#x20B1 ' +costs+'.00');
											$("#deliverycost").val(costs);
										}
										
										$.ajax({
											url: "t_amt",
											method: "POST",
											data:{},
											success: function(data){
												if(data == 0){
													$(".total_amt").html('');
													$("#total_amt").val(data);
													$("#total_order").html('');
													$("#totalorder").val(0);
														if(data == 0 || data == ''){
															$('#btn_checkout').html("<a type='submit' class='btn' id='submit' style='width:100%; background:#ff9100; color:#fff; font-size:22px'  name='submit' value='' disabled ><b>Proceed to Checkout</b></a>");
														}else{
															$('#submit').href = "<?=site_url('user/checkout')?>";
															$('#submit').removeAttr('disabled')
														}
												}else{
													$(".total_amt").html('&#x20B1 ' +data+'.00');
													$("#total_amt").val(data);
													
													var delivery = $("#deliverycost").val();
													var total = parseInt(delivery) + parseInt(data);
													
													
														$("#total_order").html('&#x20B1 ' +total+'.00');
														$("#totalorder").val(total);
														$('#submit').href = "<?=site_url('user/checkout')?>";
														$('#submit').removeAttr('disabled')
												}
												
												
												
											}
										})
									}
								});	
							}
						});
					}
				});
			});
		}
	});
	
})
	var from1 = $("#from").val();
	var brgy = $("#brgy").val();
	$.ajax({
		url: "delivery_cost",
		method	:	"get",
		data	:	{cost:1,brgy:brgy,from1:from1},
		success	:	function(data){
			var fee =$("#total_amt").val();
			if(fee == 0 || fee == ''){
				$('#btn_checkout').html("<a type='submit' class='btn' id='submit' style='width:100%; background:#ff9100; color:#fff; font-size:22px'  name='submit' value='' disabled ><b>Proceed to Checkout</b></a>");
			}
			if(data == 0 || data == ''){
				$("#delivery_cost").html('Not Available');
				$("#deliverycost").val(0);
				}else{
				var addtion =$(".addtion").val();
				var costs = parseInt(data) + parseInt(addtion);
				$("#delivery_cost").html('&#x20B1 ' +costs+'.00');
				$("#deliverycost").val(costs);
				
				var total = parseInt(costs) + parseInt(fee);
				$("#total_order").html('&#x20B1 ' +total+'.00');
				$("#totalorder").val(total);
				$('#submit').href = "<?=site_url('user/checkout')?>";
				$('#submit').removeAttr('disabled')
			}
			
		}
	});	
	
$('.add1').click(function(){
		  var id = $(this).attr('prod_id');
		  var qty = $('.qty1').val();
		  var count = $('#count1').val();
		  var total_count = parseInt(count) + 1;
		$.ajax({
			url:"add_order",
			type:'POST',
			dataTYpe:'text',
			data: {add:1, id:id, qty:qty},
			success:function(res){
				if(res == 0){
					alert('Already added!');
				}else if(res==1){
					$('#count1').val(total_count);
					$('#count2').val(total_count);
					$('#count0').html(total_count);
					$('#count00').html(total_count);
					window.location ="<?=site_url('user/cart')?>";
				}
			}
		});
	});
	 
	$("body").delegate(".wish","click",function(event){
        var id = $(this).attr('prod_id');
		$.ajax({
			url: "add_wish",
			type:'post',
			dataTYpe:'text',
			data: {add:1, id:id},
			success:function(res){
				if(res == 0){
					alert('Already added!');
				}else if(res==1){
					alert('Product is added to wishlist!');
				}
			}
		});
    });
// JavaScript Validation For Registration Page

$('document').ready(function() {

	$('input[name="cmobileNum"]').on('change', function() {

		var cmbl = $(this).val();
		console.log(cmbl);

		if (cmbl) {

			$.ajax({

				url : '/sapi',
				type : "POST",
				data : {
					mblno : cmbl
				},

				headers : {
					'X-CSRF-Token' : $('input[name="_token"]').val()
				},

				dataType : "json",

				success : function(data) {


					$.each(data, function(i, value) {

						console.log(value.name);
						$('input[name="cname"]').val(value.name);

					});

				}
			});

		}

	});

	$('select[name="brandname"]').on('change', function() {

		var stateID = $(this).val();
		console.log(stateID);

		if (stateID) {

			$.ajax({

				url : '/sapi',
				type : "POST",
				data : {
					brandname : stateID
				},

				headers : {
					'X-CSRF-Token' : $('input[name="_token"]').val()
				},

				dataType : "json",

				success : function(data) {

					

					console.log("returned data" + data);

					$.each(data, function(i, value) {

						console.log(value.model_no);
						$('select[name="modelno"]').append('<option value="' + value.model_no + '">' + value.model_no + '</option>');

					});

				}
			});

		} 

	});

	$('select[name="modelno"]').on('change', function() {

		var stateID = $(this).val();
		console.log(stateID);

		if (stateID) {

			$.ajax({

				url : '/sapi',
				type : "POST",
				data : {
					modelno : stateID,
					brandname : $('select[name="brandname"]').val()
				},

				headers : {
					'X-CSRF-Token' : $('input[name="_token"]').val()
				},

				dataType : "json",

				success : function(data) {

					//$('input[name="price"]').val('');

					console.log("returned data" + data);

					$.each(data, function(i, value) {

						console.log(value.sellprice);
						//$('input[name="price"]').append('<option value="' + value.sellprice + '">' + value.model_no + '</option>');
						$('input[name="price"]').val(value.sellprice);

					});

				}
			});

		} else {

			$('input[name="price"]').val('');
		}

	});
	
	$('input[name="amount"]').on('change', function() {

		var amount = $(this).val();
		var price = $('input[name="price"]').val();

		if (amount && price) {

			var total= amount*price;
			$('input[name="total"]').val(total);
		}
		
		

	});

	var MobileNumberRegex = /^[0][1][5-9][0-9][0-9](\d{6})$/;

	$.validator.addMethod("validno", function(value, element) {
		return this.optional(element) || MobileNumberRegex.test(value);
	});

	var nameregex = /^[a-zA-Z ]+$/;

	$.validator.addMethod("validname", function(value, element) {
		return this.optional(element) || nameregex.test(value);
	});

	var numregex = /^\d+$/;

	$.validator.addMethod("numeric", function(value, element) {
		return this.optional(element) || numregex.test(value);
	});

	$("#register").validate({

		rules : {
			cmobileNum : {
				required : true,
				validno : true
			},
			amount : {
				required : true,
				numeric : true
			},
			cname : {
				required : true,
				validname : true
			},
			price : {
				required : true,
				numeric : true
			},
		},
		messages : {
			amount : {
				required : "Please Enter Amount Of Product",
				numeric : "Enter Valid Amount"
			},
			cmobileNum : {
				required : "Please Enter Mobile Number",
				validno : "Enter Valid Mobile Number"
			},
			price : {
				required : "Please Enter Email Address",
				numeric : "Enter Valid Email Address"
			},
			cname : {
				required : "Please Enter Name",
				numeric : "Enter Valid Name"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('.form-group').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight : function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			$(element).closest('.form-group').find('.help-block').html('');
		},

		submitHandler : function(form) {

			form.submit();
		}
	});

}); 
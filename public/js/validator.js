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

	$('input[name="add"]').on('click', function() {
		var cloned = $('#product').clone(true);
		var length = $('.add').length;
		console.log(length);
		var ou = cloned.find('select[name="brandname[]"]').attr('id', length + 1);
		var ou = cloned.find('select[name="modelno[]"]').attr('id', length + 1);
		var ou = cloned.find('input[name="price[]"]').attr('id', length + 1);
		var ou = cloned.find('input[name="amount[]"]').attr('id', length + 1);
		console.log(ou);
		$('#products').append(cloned).value('');
		
	});

	$('.brand').change(function() {

		console.log('ovii');
		var stateID = $(this).val();
		var ID = $(this).attr('id');

		console.log(ID);
		console.log('ovii');
		console.log(stateID);

		if (stateID != '') {

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

					if (!$.isEmptyObject(data)) {
						$.each(data, function(i, value) {

							console.log(value.model_no);
							$('select[name="modelno[]"][id="' + ID + '"]').append('<option value="' + value.model_no + '">' + value.model_no + '</option>');

						});
					} else {

						$('select[name="modelno[]"][id="' + ID + '"]').empty();
						$('select[name="modelno[]"][id="' + ID + '"]').append('<option value="">Select Model</option>');
					}

				}
			});

		} else {

			$('select[name="modelno[]"][id="' + ID + '"]').empty();
			$('select[name="modelno[]"][id="' + ID + '"]').append('<option value="">Select Model</option>');
		}

	});

	$('.model').on('change', function() {

		var modelName = $(this).val();
		var ID = $(this).attr('id');
		console.log(ID);

		if (modelName!='') {

			$.ajax({

				url : '/sapi',
				type : "POST",
				data : {
					modelno : modelName,
					brandname : $('select[name="brandname[]"][id="' + ID + '"]').val()
				},

				headers : {
					'X-CSRF-Token' : $('input[name="_token"]').val()
				},

				dataType : "json",

				success : function(data) {

					//$('input[name="price[]"]').val('');

					console.log("returned data" + data);

					$.each(data, function(i, value) {

						console.log(value.sellprice);
						//$('input[name="price[]"]').append('<option value="' + value.sellprice + '">' + value.model_no + '</option>');
						$('input[name="price[]"][id="' + ID + '"]').val(value.sellprice);

					});

				}
			});

		} else {

			$('input[name="price[]"][id="' + ID + '"]').val('');
		}

	});

	$('.amount').on('change', function() {
		var loopTotalIndex = $('.add').length;
		var loopIndex;
		var amount;
		var price;
		var total=0;
		console.log(loopTotalIndex);
		for(loopIndex = 1 ;loopIndex <= loopTotalIndex ; loopIndex++){
			 amount = $('input[name="amount[]"][id="' + loopIndex + '"]').val();
			 price = $('input[name="price[]"][id="' + loopIndex + '"]').val();
	
			if (amount && price) {
	
				total = total + amount * price;				
			}
		}
		$('input[name="total"]').val(total);

	});

	var MobileNumberRegex = /^[0][1][5-9][0-9][0-9](\d{6})$/;

	$.validator.addMethod("validno", function(value, element) {
		console.log(value);
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
			ignore: [],
			cmobileNum : {
				required : true,
				validno : true
			},
			'amount[]' : {
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
			'amount[]' : {
				required : "Please Enter Amount Of Product",
				numeric : "Enter Valid Amount"
			},
			cmobileNum : {
				required : "Please Enter Mobile Number",
				validno : "Enter Valid Mobile Number"
			},
			price : {
				required : "Please Enter price",
				numeric : "Enter Valid Price"
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

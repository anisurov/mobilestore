$('document').ready(function () {
    $('#from_date,#to_date').on('change', function () {

        var fromdate = $('#from_date').val();
        var todate = $('#to_date').val();
        console.log(fromdate);
        if (fromdate != '' && todate != '') {

            $.ajax({
                url: '/reportdate2',
                type: "POST",
                data: {
                    fromdate: fromdate,
                    todate: todate
                },
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                dataType: "json",
                success: function (data) {

                    console.log("returned data" + data);

                    if (!$.isEmptyObject(data)) {
                        $('#tbody').empty();

                        $.each(data, function (i, value) {

                            var sl = i + 1;
                            var str = ' <tr> ' +
                                    '<td class="text-center"> ' + sl + '</td>' +
                                    '<td class="text-center">buy</td>' +
                                    '<td class="text-center">' + value.brandname + '</td>' +
                                    '<td class="text-center">' + value.modelno + '</td>' +
                                    '<td class="text-center">' + value.amount + '</td>' +
                                    '<td class="text-center">' + value.buyprice + '</td>' +
                                    ' </tr> ';
                            $('#tbody').append(str);
                        });
                    } else {
                        $('#tbody').empty();
                        $('#tbody').append('        This model is not available');
                    }

                }
            });

        }

    });
});

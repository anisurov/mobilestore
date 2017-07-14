$('document').ready(function () {
    $('#from_date').on('change', function () {

        var fromdate = $('#from_date').val();
        console.log(fromdate);
        if (fromdate != '') {

            $.ajax({
                url: '/reportdate2',
                type: "POST",
                data: {
                    fromdate: fromdate
                },
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                dataType: "json",
                success: function (data) {

                    console.log("returned data" + data);
                    $('#tbody').empty();
                    $('#t1body').empty();
                    if (!$.isEmptyObject(data)) {
                        $k = 1;
                        $j = 1;
                        $.each(data, function (i, value) {
                            if (value.transaction == 'buy')
                            {
                                var sl = $j;
                                var str = ' <tr> ' +
                                        '<td class="text-center"> ' + sl + '</td>' +
                                        '<td class="text-center">' + value.brandname + '</td>' +
                                        '<td class="text-center">' + value.modelno + '</td>' +
                                        '<td class="text-center">' + value.amount + '</td>' +
                                        '<td class="text-center">' + value.buyprice + '</td>' +
                                        ' </tr> ';
                                $('#tbody').append(str);
                                $j = $j + 1;
                            }
                            if (value.transaction == 'sell')
                            {
                                var sl = $k;
                                var str = ' <tr> ' +
                                        '<td class="text-center"> ' + sl + '</td>' +
                                        '<td class="text-center">' + value.brandname + '</td>' +
                                        '<td class="text-center">' + value.modelno + '</td>' +
                                        '<td class="text-center">' + value.amount + '</td>' +
                                        '<td class="text-center">' + value.buyprice + '</td>' +
                                        ' </tr> ';
                                $('#t1body').append(str);
                                $k = $k + 1;
                            }
                        });
                    }

                },
                error: function (request, status, error) {
                         $('#tbody').empty();
                        $('#t1body').empty();
                        $('#tbody').append('         Entry is not available');
                        $('#t1body').append('         Entry is not available');
                }
            });

        }

    });
});

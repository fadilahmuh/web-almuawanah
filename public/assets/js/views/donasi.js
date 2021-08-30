$(document).on("click", ".bayar", function (e) {
    e.preventDefault();
    const clientInfo = $("#form-wakaf").serialize();
    const searchParams = new URLSearchParams(clientInfo);
    data = Object.fromEntries(searchParams);
    var route = $(this).data("url");
    $.ajax({
        type: "GET",
        url: route,
        data: {
            data,
        },
        dataType: "json",
        success: function (response) {
            snap.pay(response.token);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(
                xhr.status + "\n" + xhr.responseText + "\n" + thrownError
            );
        },
    });
});

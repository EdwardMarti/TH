function aoutocomplete(select, array) {
    $('#select > option').each(function() {
        //            alert($(this).text() + ' ' + $(this).val());
        array.push($(this).text());
        alert(array);
    });
}
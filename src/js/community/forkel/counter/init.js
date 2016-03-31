document.observe('dom:loaded', function() {

    if (typeof CountUp === 'undefined') {
        displayAlert('.forkel_counter_alert .alert');
        return;
    }

    function displayAlert(element) {
        [].forEach.call(document.querySelectorAll(element), function(e) {
            e.style.display = 'block';
        });
    }

    var counter = document.querySelectorAll('.counter')

    for (var i=0; i<counter.length; i++)
    {
        var el = counter[i];

        var from = el.getAttribute('data-from');
        var to = el.getAttribute('data-to');
        var decimals = el.getAttribute('data-decimals');
        var duration = el.getAttribute('data-duration');
        var options = JSON.parse(el.getAttribute('data-options'));

        c = new CountUp(el, from, to, decimals, duration, options);
        c.start();
    }

});

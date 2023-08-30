<!--   Core JS Files   -->
<?= script_tag('js/bootstrap.min.js') ?>
<?= script_tag('js/popper.min.js') ?>

<!-- jq -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- data table CDN -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- alertify JavaScript -->
<?= script_tag('alertify\alertify.min.js') ?>

<!-- scroller bar -->
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>



<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
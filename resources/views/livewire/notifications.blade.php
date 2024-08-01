<div>
    <script>
        window.addEventListener('show-toast', event => {
            toastr[event.detail.type](event.detail.message);
        });
    </script>
</div>
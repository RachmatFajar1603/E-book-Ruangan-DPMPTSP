import './bootstrap';

import Alpine from 'alpinejs';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

window.toastr = toastr;

// Optional: Configure Toastr globally
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-top-right",
};

window.Alpine = Alpine;

Alpine.start();

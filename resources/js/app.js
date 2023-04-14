import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// DataTable
import DataTable from 'datatables.net-dt';
// import 'datatables.net-responsive-dt';

let table = new DataTable('#myTable', {
    responsive: true
});


// Sweet Alert
import Swal from 'sweetalert2';
window.Swal = Swal;

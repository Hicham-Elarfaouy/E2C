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


const roleSelect = document.getElementById('role')
const codeBlock = document.getElementById('student-block')

roleSelect.addEventListener('change', () => {
    const selectedValue = roleSelect.value
    if (selectedValue === "student") {
        codeBlock.classList.remove('hidden')
    } else {
        codeBlock.classList.add('hidden')
    }
})

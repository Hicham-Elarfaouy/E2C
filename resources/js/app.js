import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


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

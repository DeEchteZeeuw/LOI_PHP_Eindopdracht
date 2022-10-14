document.addEventListener("DOMContentLoaded", function() {

    document.querySelectorAll('[show-row]').forEach(el => {
        el.addEventListener('click', function() {
            const family = this.getAttribute('show-row');

            document.querySelectorAll(`tr[family="${family}"]`).forEach(el => {
                (el.getAttribute('hidden') === 'true') ? el.setAttribute('hidden', 'false') : el.setAttribute('hidden', 'true');
            });
        });
    });

    document.querySelectorAll('[show-years]').forEach(el => {
        el.addEventListener('click', function() {
            const member = this.getAttribute('show-years');

            document.querySelectorAll(`tr[family-member="${member}"]`).forEach(el => {
                (el.getAttribute('hidden') === 'true') ? el.setAttribute('hidden', 'false') : el.setAttribute('hidden', 'true');
            });
        });
    });
});
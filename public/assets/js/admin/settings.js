document.addEventListener('DOMContentLoaded', () => {
    if (window.location.href) {

        document.querySelector('.disable-user').addEventListener('click', e => {
            e.preventDefault()
            document.querySelector('.modal-container').style.display = 'block;';
            document.querySelector('.modal-btn').click();

            // If clicke on cancel button, it will get out from the modal
            document.querySelector('.btn.btn--danger').addEventListener('click', e => {
                e.preventDefault();
                document.querySelector('.modal-backdrop').click();
            })
        });
    }
})
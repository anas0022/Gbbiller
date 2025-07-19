document.addEventListener('DOMContentLoaded', function() {
window.addEventListener('load', function() {
    const progressBar = document.querySelector('.loading-progress');
    const loadingText = document.querySelector('.loading-text');
    
    // Animate progress bar to 100%
    progressBar.style.width = '100%';
    
    // Wait for progress bar animation to complete
    setTimeout(function() {
        // Hide preloader
        document.querySelector('.preloader').classList.add('fade-out');
        // Show main content
        document.querySelector('.main-content').classList.add('show');
    }, 2000);
});


    // Login form handler
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const csrfToken = document.querySelector('input[name="_token"]').value;
            const button = document.getElementById('loginButton');
            const buttonText = document.getElementById('buttonText');
            const spinner = document.getElementById('loginSpinner');
            
            button.disabled = true;
            buttonText.style.display = 'none';
            spinner.style.display = 'block';
            fetch(loginForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect || '/dashboard';
                    button.disabled = false;
                    buttonText.style.display = 'block';
                    spinner.style.display = 'none';
                } 
              
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message || 'Invalid credentials!',
                        confirmButtonColor: '#d33'
                    });
                    button.disabled = false;
                    buttonText.style.display = 'block';
                    spinner.style.display = 'none';
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again.',
                    confirmButtonColor: '#d33'
                });
                button.disabled = false;
                buttonText.style.display = 'block';
                spinner.style.display = 'none';
            });
        });
    }
   
});

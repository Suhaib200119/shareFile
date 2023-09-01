import Echo from 'laravel-echo';
import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

window.Echo.private("App.Models.User."+ user_id)
      .notification(function(dataFromPusher){
            Swal.fire({
                  position: 'top-end',
                  icon: '',
                  title: dataFromPusher.title,
                  showConfirmButton: false,
                  timer: 1500
                });
           
});

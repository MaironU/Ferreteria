$(document).ready(function(){
    let width = screen.width;

    if(width <= 756){
        console.log("siiii")
        $("#page-top").addClass("sidebar-toggled")
        $("#accordionSidebar").addClass("toggled")
    }
})

$("#images_products").on('change', function(){
    let files =  document.getElementById("images_products")
    if(files.files.length > 0){
        for (let i = 0; i < files.files.length; i++) {
            var reader = new FileReader()
            reader.onload = function(e){
                $("#products_images").append(`
                    <div>
                        <img src="${e.target.result}" width="140px"></img>
                    </div>
                `)
            }
            reader.readAsDataURL(files.files[i]);
        }
    }
})

$(".delete_product").on('click', function(){
    let id = $("#product_id").val()
    console.log("el id", id)
    Swal.fire({
        title: '¿Está seguro de eliminar el producto?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar'    
      }).then((result) => {
        if (result.isConfirmed) {
            $("#form_delete_" + id).submit();  
        }
      })
})

$(document).ready(function(){
    $.fn.andSelf = function() { return this.addBack.apply(this, arguments); }

    $('.owl-carousel').owlCarousel({
        nav: true,
        margin: 0,
        loop: true,
        autoplay: true,
        items: 1,
        dotsContainer: '.carousel-custom-dots',
        URLhashListener: true,
        autoplayHoverPause: true,
        startPosition: 'URLHash',
        navText : ["<div style='top: 32%!important' class='btn-prev'></div>", "<div style='top: 32%!important' class='btn-next'></div>"]
    })
})

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
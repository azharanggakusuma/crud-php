$(document).ready(function(){
    $('.nav').delegate('.tidak-aktif', 'click', function(event){
	    var $this = $(this);
	    $this.removeClass('tidak-aktif').addClass("aktif");
        $this.siblings().addClass('tidak-aktif').removeClass('aktif');
    });
});

/*function konfirmasi(){
    var klik = confirm("Apakah ingin kembali ke halaman utama?");

    if(klik){
        window.location = "hapus.php";
    }else{
        window.location = "./";
    }
}*/

function gantiTema(){
    var hitam = document.getElementById('hitam');

    hitam.classList.toggle("tema-hitam");
}
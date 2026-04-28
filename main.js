


function mulai(){
  Swal.fire({
    title:'Silahkan pilih tempat latihan anda',
    html:`
    <button id='btn-gym'class='swal2-confirm swal2-styled' style='margin:8px' >Di Gym</button>
    <button id='btn-rumah'class='swal2-confirm swal2-styled' style='margin:8px' onclick='window.location.href="index.php?p=program latihan&tipe=rumah"'>Di Rumah</button>
    `,
    showConfirmButton:false,
    showCancelButton:true,
    didOpen:()=>{
      document.getElementById('btn-gym').addEventListener('click',()=>{
        window.location.href="index.php?p=program latihan&tipe=gym"
      })
      document.getElementById('btn-rumah').addEventListener('click',()=>{
        window.location.href="index.php?p=program latihan&tipe=rumah"
      })
    }
  })
}